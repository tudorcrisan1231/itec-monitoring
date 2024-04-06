<?php

namespace App\Livewire;

use App\Models\Log;
use App\Models\Report;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;
use Asantibanez\LivewireCharts\Models\PieChartModel;
use App\Models\Application as AppModel;
use App\Models\UserApplication;
use Livewire\Component;

class Application extends Component
{
    public $name, $application, $endpointsStatus = [];
    public $startDate, $endDate;

    public function deleteApplication(){
        $this->application->delete();
        UserApplication::where('application_id', $this->application->id)->delete();
        Log::where('application_id', $this->application->id)->delete();
        Report::where('application_id', $this->application->id)->delete();
        return redirect()->route('dashboard')->with('success', 'Application deleted successfully');
    }

    public function filterCalls()
    {
        //redirect to the same page with the query string of the start and end date
        return redirect()->route('application', ['name' => $this->name, 'startDate' => $this->startDate, 'endDate' => $this->endDate]);
    }

    public function mount(){

        $this->application = AppModel::where('name', $this->name)->first();

        if(!$this->application){
            return abort(404);
        }
        //select distinct status from logs where application_id = $this->application->id
        foreach ($this->application->endpoints as $endpoint){
            $this->endpointsStatus[$endpoint->id] = Log::where('application_id', $this->application->id)->where('endpoint_id', $endpoint->id)->get();
        }
//        dd($this->endpointsStatus);
        callEndpoints($this->application->id);
        //if startDate exist in the query string, set the startDate to the query string value
        if(request()->query('startDate')){
            $this->startDate = request()->query('startDate');
        } else {
            $this->startDate = null;
        }

        //if endDate exist in the query string, set the endDate to the query string value
        if(request()->query('endDate')){
            $this->endDate = request()->query('endDate');
        } else {
            $this->endDate = null;
        }
    }
    public function render()
    {
        foreach ($this->application->endpoints as $endpoint){
            $endpoint_logs_status_distict = Log::select('status')->where('application_id', $this->application->id)->where('endpoint_id', $endpoint->id);

            if($this->startDate){
                $endpoint_logs_status_distict = $endpoint_logs_status_distict->where('created_at', '>=', $this->startDate);
            }

            if($this->endDate){
                $endpoint_logs_status_distict = $endpoint_logs_status_distict->where('created_at', '<=', $this->endDate);
            }

            $endpoint_logs_status_distict = $endpoint_logs_status_distict->distinct()->get();

            $pieChartModel[$endpoint->id] = (new PieChartModel())
                ->setAnimated(true);
            foreach ($endpoint_logs_status_distict as $status){
                $count = Log::where('application_id', $this->application->id)->where('endpoint_id', $endpoint->id)->where('status', $status->status);

                if($this->startDate){
                    $count = $count->where('created_at', '>=', $this->startDate);
                }

                if($this->endDate){
                    $count = $count->where('created_at', '<=', $this->endDate);
                }

                $count = $count->count();

                $pieChartModel[$endpoint->id]->addSlice($status->status, $count, statusCodeColor($status->status));
            }
        }

        return view('livewire.application', compact('pieChartModel'));
    }
}
