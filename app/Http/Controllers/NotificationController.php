<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function sendNotification(Request $request)
    {
        $users = User::whereHas('notificationTypes', function($query) use ($request) {
            $query->where('type', $request->type);
        })->get();

        foreach ($users as $user) {
            $notification = new Notification([
                'type' => $request->type,
                'message' => $request->message,
                'status' => 'pending',
            ]);

            $user->notifications()->save($notification);
            dispatch(new SendNotificationJob($notification));
        }

        return response()->json(['status' => 'Notifications sent to queue']);
    }
}
