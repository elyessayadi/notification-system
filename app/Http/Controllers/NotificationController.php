<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\NotificationType;
use App\Models\Notification;
use App\Jobs\SendNotificationJob;

class NotificationController extends Controller
{
    public function sendNotifications()
    {
        $users = User::with('notificationTypes')->get();

        $notifications = Notification::where('status', 'pending')->get();
        foreach ($users as $user) {
            // Get the notification types the user is subscribed to
            $subscribedTypes = $user->notificationTypes->pluck('type')->toArray();

            // Filter notifications where the type is in the user's subscribed types
            $userNotifications = $notifications->whereIn('type', $subscribedTypes);

            foreach ($userNotifications as $notification) {
                // Dispatch the job for each notification
                dispatch(new SendNotificationJob($notification,$user));
            }
        }

        return response()->json(['status' => 'Notifications sent to queue']);
    }
}
