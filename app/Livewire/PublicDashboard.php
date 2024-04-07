<?php

namespace App\Livewire;
use App\Models\Application;
use App\Models\Report;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use App\Mail\AlertDeveloper;
use Spatie\SlackAlerts\Facades\SlackAlert;

class PublicDashboard extends Component
{
    public $applications = [], $toggleReportIssue = null, $selectedApplication;
    public $issue = '';

    public function openReportIssue($id){
        $this->toggleReportIssue = $id;

        $this->selectedApplication = Application::find($id);
    }

    public function closeReportIssue()
    {
        $this->toggleReportIssue = null;
        $this->selectedApplication = null;
    }

    public function reportIssue()
    {
        $this->validate([
            'issue' => 'required'
        ]);

        Report::create([
            'application_id' => $this->selectedApplication->id,
            'description' => $this->issue
        ]);

        $this->selectedApplication->status = 'unstable';
        $this->selectedApplication->save();

        //make a post curl request to: curl -X POST -H 'Content-type: application/json' --data '{"text":"Hello, World!"}' https://hooks.slack.com/services/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
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, env('SLACK_ALERT_WEBHOOK'));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(['text' => "Someone reported an issue with your application. Please check the dashboard for more details. Message: $this->issue"]));
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);

        Mail::to($this->selectedApplication->user ? $this->selectedApplication->user->email : '')->cc(ccMails())->queue(new AlertDeveloper($this->selectedApplication, "Someone reported an issue with your application. Please check the dashboard for more details. Message: $this->issue"));

        return redirect()->route('home')->with('success', 'Issue reported successfully');
    }

    public function mount(){
        $this->applications = Application::all();
    }

    public function render()
    {
        return view('livewire.public-dashboard');
    }
}
