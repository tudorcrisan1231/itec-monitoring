<?php

namespace App\Livewire;
use App\Models\Application;
use App\Models\Report;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use App\Mail\AlertDeveloper;
use Spatie\SlackAlerts\SlackAlert;

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

        Mail::to($this->selectedApplication->user ? $this->selectedApplication->user->email : '')->cc(ccMails())->queue(new AlertDeveloper($this->selectedApplication, "Someone reported an issue with your application. Please check the dashboard for more details. Message: $this->issue"));
        SlackAlert::blocks([
            [
                "type" => "section",
                "text" => [
                    "type" => "mrkdwn",
                    "text" => "Someone reported an issue with your application. Please check the dashboard for more details. Message: $this->issue"
                ]
            ]
        ]);

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
