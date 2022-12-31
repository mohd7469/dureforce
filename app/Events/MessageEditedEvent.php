<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MessageEditedEvent implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    protected $message,$user,$job;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($message,$user,$job)
    {
        $this->user=$user;
        $this->message=$message;
        $this->job=$job;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return 'user-'.$this->user->id.$this->job->id.'-message-channel';
    }

    public function broadcastAs()
    {
        return 'edited-message';
    }
    public function broadcastWith() {
        return ["message"=>$this->message];
    }
}
