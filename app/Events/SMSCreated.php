<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class SMSCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user_id;
    public $device;
    public $phone;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($user_id,$device,$phone)
    {
        $this->user_id = $user_id;
        $this->device = $device;
        $this->phone = $phone;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
