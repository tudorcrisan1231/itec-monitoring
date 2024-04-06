<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class LogUpdated implements ShouldBroadcast
{
    use Dispatchable, SerializesModels;

    public $logData;

    /**
     * Create a new event instance.
     *
     *
     */
    public function __construct($logData)
    {
        $this->logData = $logData;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return PrivateChannel
     */
    public function broadcastOn()
    {
        return new PrivateChannel('log-updated');
    }
}
