<?php

namespace App\Events;

use App\Models\Notification;
use Illuminate\Broadcasting\Channel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Models\User;

class NotificationSent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets;

    public $notification;
    protected $user;

    public function __construct(Notification $notification, User $user)
    {
        $this->notification = $notification;
        $this->user = $user;

    }

    public function broadcastOn()
    {
        return new Channel('notifications.' . $this->user->id);
    }
    public function broadcastWith()
    {
        return [
            'message' => $this->notification->message,
            'type' => $this->notification->type,
        ];
    }
}
