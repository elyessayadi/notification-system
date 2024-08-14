<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;


class SendNotificationJob extends Job implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $notification;

    public function __construct(Notification $notification)
    {
        $this->notification = $notification;
    }

    public function handle()
    {
        // Determine action based on the notification type
        if($this->notification->type==='email'){
            $this->sendEmailNotification();
        }else{
            $this->broadcastRealTimeNotification();
        }

        $this->notification->status = 'sent';
        $this->notification->save();
    }

    protected function sendEmailNotification()
    {
        Mail::to($this->notification->user->email)->send(new NotificationMail($this->notification));
    }

    protected function broadcastRealTimeNotification()
    {
        event(new NotificationSent($this->notification));
    }
}
