<?php

namespace App\Livewire;
use App\Models\Report;
use Livewire\Component;

class Tickets extends Component
{
    public $tickets = [];

    public function closeTicket($id){
        $ticket = Report::find($id);
        $ticket->status = 'closed';
        $ticket->save();

        return redirect()->route('tickets')->with('success', 'Ticket closed successfully');
    }

    public function mount()
    {
        $this->tickets = Report::where('status', 'pending')->orderBy('created_at', 'desc')->get();
    }

    public function render()
    {
        return view('livewire.tickets');
    }
}
