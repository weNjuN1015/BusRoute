<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class VehiclePositionUpdated implements ShouldBroadcast
{
    use InteractsWithSockets, SerializesModels;

    public $position;

    public function __construct($position)
    {
        $this->position = $position;
    }

    public function broadcastOn()
    {
        return new Channel('vehicle.positions');
    }
}
