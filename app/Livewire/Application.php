<?php

namespace App\Livewire;

use App\Models\Log;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;
use Asantibanez\LivewireCharts\Models\PieChartModel;
use App\Models\Application as AppModel;
use Livewire\Component;

class Application extends Component
{
    public $name, $application, $endpointsStatus = [];

    public function deleteApplication(){
        $this->application->delete();
        return redirect()->route('dashboard')->with('success', 'Application deleted successfully');
    }
    public function mount(){

        $this->application = AppModel::where('name', $this->name)->first();
        //select distinct status from logs where application_id = $this->application->id
//        $this->endpointsStatus = Log::select('status')->where('application_id', $this->application->id)->distinct()->get();
        foreach ($this->application->endpoints as $endpoint){
            $this->endpointsStatus[$endpoint->id] = Log::where('application_id', $this->application->id)->where('endpoint_id', $endpoint->id)->get();
        }
//        dd($this->endpointsStatus);
        callEndpoints($this->application->id);
    }
    public function render()
    {
        $columnChartModel = (new PieChartModel())
                ->setAnimated(true)
                ->addSlice('200', 22, '#10b981')
                ->addSlice('500', 2, '#f87171');

        foreach ($this->application->endpoints as $endpoint){
            $endpoint_logs_status_distict = Log::select('status')->where('application_id', $this->application->id)->where('endpoint_id', $endpoint->id)->distinct()->get();
//            dd($endpoint->logs, $endpoint->id, $endpoint_logs_status_distict);

            $pieChartModel[$endpoint->id] = (new PieChartModel())
                ->setAnimated(true);
            foreach ($endpoint_logs_status_distict as $status){
                $count = Log::where('application_id', $this->application->id)->where('endpoint_id', $endpoint->id)->where('status', $status->status)->count();
                $pieChartModel[$endpoint->id]->addSlice($status->status, $count, statusCodeColor($status->status));
            }
        }

        return view('livewire.application', compact('pieChartModel'));
    }
}
