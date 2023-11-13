<?php

namespace App\Events;

use App\Models\Homework;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewHomeworkEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $homework;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Homework $homework)
    {
        $this->homework = $homework;
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
