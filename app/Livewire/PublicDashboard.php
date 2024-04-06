<?php

namespace App\Livewire;
use App\Models\Application;
use App\Models\Report;
use Livewire\Component;

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
