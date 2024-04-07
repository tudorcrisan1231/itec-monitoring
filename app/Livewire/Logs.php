<?php

namespace App\Livewire;
use App\Models\Log;
use App\Models\Application;
use Livewire\WithPagination;
use App\Events\LogUpdated;
use Livewire\Attributes\On;

use Livewire\Component;

class Logs extends Component
{
    use WithPagination;
    public $applications,$selectedMethod, $selectedApplication;
//    protected $listeners = ['LogUpdated' => 'updateLogs'];

    #[On('echo:private-log-updated,LogUpdated')]
    public function updateLogs($log)
    {
        //refresh the logs only if the ?page is not set
        if(!request()->has('page')){
            $this->render();
        }
    }

    public function filterLogs()
    {
        $this->render();
        $this->resetPage();
    }

    public function mount()
    {
        $this->applications = Application::all();

        $this->selectedMethod = 'all';
        $this->selectedApplication = 'all';
    }
    public function render()
    {

        $logs = Log::query();

        if($this->selectedMethod && $this->selectedMethod != 'all'){
            $logs = $logs->where('method', $this->selectedMethod);
        }

        if($this->selectedApplication && $this->selectedApplication != 'all'){
            $logs = $logs->where('application_id', $this->selectedApplication);
        }

        $logs = $logs->orderBy('created_at', 'desc')->paginate(10);

        return view('livewire.logs', compact('logs'));
    }
}
