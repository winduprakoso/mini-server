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

class ActionEvent implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $actionId;
    public $actionData;
    // public $actionData2;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($actionId, $actionData)
    {
        $this->actionId = $actionId;
        $this->actionData = $actionData;
        // $this->actionData = $actionData2;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        // return new PrivateChannel('sampel-socket');
        return new Channel('sampel-socket');

    }

    public function broadcastAs()
    {
        return 'SampleSocket';
    }

    public function broadcastWith()
    {
        return [
            'actionId' => $this->actionId,    
            'actionData' => $this->actionData,
            // 'actionData2' => $this->actionData2,

        ];
    }
}