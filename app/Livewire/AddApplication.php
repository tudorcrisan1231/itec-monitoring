<?php

namespace App\Livewire;

use App\Models\Application;
use App\Models\Endpoint;
use App\Models\UserApplication;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddApplication extends Component
{
    use WithFileUploads;

    public $logo, $name, $description, $url, $seconds, $endpoints = [
        ['method' => 'GET', 'url' => ''],
    ];
    public $isEdit = null, $tmpLogo = null, $tmpEndpoints = [];

    public function addEndpoint(){
        $this->endpoints[] = ['method' => 'GET', 'url' => ''];
    }

    public function removeEndpoint($index){
        unset($this->endpoints[$index]);
    }

    public function createApplication(){
        $this->validate([
            'name' => 'required',
            'url' => 'required',
            'endpoints.*.method' => 'required',
            'endpoints.*.url' => 'required',
            'seconds' => 'required|numeric|min:60',
        ]);

        if($this->isEdit){
            $app = Application::find($this->isEdit);
        } else {
            $this->validate([
                'name' => 'unique:applications,name',
            ]);
            $app = new Application();
        }
        $app->user_id = auth()->user()->id;
        $app->name = $this->name;
        $app->description = $this->description;
        $app->url = $this->isEdit ? $this->url : 'https://'.$this->url;
        $app->cron_seconds = $this->seconds;

        if($this->logo){
            $this->validate([
                'logo' => 'image|max:1024',
            ]);
            $app->logo = $this->logo->store('logos', 'public');
        }

        $app->save();

        foreach($this->endpoints as $endpoint){
            //verify if the endpoint is already in the database
            if(Endpoint::where('url', $endpoint['url'])->where('application_id', $app->id)->first()){
                continue;
            }

            $ep = new Endpoint();
            $ep->user_id = auth()->user()->id;
            $ep->application_id = $app->id;
            $ep->method = $endpoint['method'];
            $ep->url = $endpoint['url'];
            $ep->save();
        }

        //if is edit then the app link to the user is already there
        if($this->isEdit){
            return redirect()->route('dashboard')->with('message', 'Application updated successfully!');
        }

        $ua = new UserApplication();
        $ua->user_id = auth()->user()->id;
        $ua->application_id = $app->id;
        $ua->save();

        return redirect()->route('dashboard')->with('message', 'Application created successfully!');
    }

    public function removeTmpLogo(){
        $this->tmpLogo = null;
    }

    public function mount(){
        //if edit param is passed in the URL
        if(request()->edit){
            $app = Application::find(request()->edit);

            if(!$app){
                return redirect()->route('dashboard');
            }
            $this->isEdit = $app->id;

            $this->name = $app->name;
            $this->description = $app->description;
            $this->url = $app->url;
            $this->tmpLogo = $app->logo;

            $this->endpoints = [];
            $this->tmpEndpoints = [];
            foreach($app->endpoints as $endpoint){
                $this->endpoints[] = ['method' => $endpoint->method, 'url' => $endpoint->url];
                $this->tmpEndpoints[] = ['method' => $endpoint->method, 'url' => $endpoint->url];
            }
        }
    }
    public function render()
    {
        return view('livewire.add-application');
    }
}
