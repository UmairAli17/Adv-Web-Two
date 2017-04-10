<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\User;

class ShopkeeperRegistered
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    public $userID;
    /**
     * Create a new event instance.
     * Get the User Instance
     * @return void
     */
    public function __construct(User $userID)
    {
        $this->id = $userID;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return [];
    }
}
