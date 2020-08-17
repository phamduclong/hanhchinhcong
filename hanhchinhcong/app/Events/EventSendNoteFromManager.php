<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class EventSendNoteFromManager implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $hs;
    public $numberOfMessage;
    public $contentOfMessage;

    public function __construct($hs, $numberOfMessage, $contentOfMessage)
    {
        $this->hs = $hs;
        $this->numberOfMessage = $numberOfMessage;
        $this->contentOfMessage = $contentOfMessage;
    }

    public function broadcastOn()
    {
        return ['my-channel-manager'];
    }

    public function broadcastAs()
    {
        return 'my-event-manager';
    }
}
