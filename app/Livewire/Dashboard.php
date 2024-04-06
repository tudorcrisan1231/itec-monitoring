<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Log;
use App\Models\Application;

class Dashboard extends Component
{
    public $pendingUsers = [], $last10Logs = [], $applications = [];

    public function approveUser($id){
        $user = User::find($id);
        $user->status = 'approved';
        $user->save();

        return redirect()->route('dashboard')->with('success', 'User approved successfully');
    }

    public function rejectUser($id){
        $user = User::find($id);
        $user->status = 'blocked';
        $user->save();

        return redirect()->route('dashboard')->with('success', 'User rejected successfully');
    }

    public function mount(){
        $this->pendingUsers = User::where('status', 'pending')->get();
        $this->last10Logs = Log::orderBy('id', 'desc')->take(6)->get();
        $this->applications = Application::all();
    }
    public function render()
    {
        return view('livewire.dashboard');
    }
}
