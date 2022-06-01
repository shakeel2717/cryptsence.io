<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ReferralCommission
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user_id;
    public $balance;
    public $coin_id;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($user_id,$balance,$coin_id)
    {
        $this->user_id = $user_id;
        $this->balance = $balance;
        $this->coin_id = $coin_id;

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
