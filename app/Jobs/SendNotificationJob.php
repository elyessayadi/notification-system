<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Notification;
use App\Models\User;
use App\Mail\NotificationMail;
use App\Events\NotificationSent;
use Illuminate\Support\Facades\Mail;

class SendNotificationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $notification;
    protected $user;

    public function __construct(Notification $notification,User $user)
    {
        $this->notification = $notification;
        $this->user = $user;

    }

    public function handle()
    {

        // Determine action based on the notification type
        switch ($this->notification->type) {
            case 'email':
                // Send email notification
                $this->sendEmailNotification();
                break;

            case 'alert':
            case 'news':
            case 'update':
                // Send real-time notification via Pusher and Laravel Echo
                $this->broadcastRealTimeNotification();
                break;

            default:
                break;
        }

        // Update the notification status to 'sent'
        $this->notification->status = 'sent';
        $this->notification->save();
    }

    protected function sendEmailNotification()
    {
        Mail::to($this->user->email)->send(new NotificationMail($this->notification));
    }

    protected function broadcastRealTimeNotification()
    {
        event(new NotificationSent($this->notification,$this->user));
    }
}
