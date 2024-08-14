<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\NotificationType;
use App\Models\Notification;

class NotificationSeeder extends Seeder
{
    public function run()
    {
        $notificationTypes = NotificationType::pluck('type')->toArray();
        foreach (range(1, 10) as $index) {
            $notification = Notification::create([
                'type' => $notificationTypes[array_rand($notificationTypes)],
                'message' => 'This is a sample notification message ' . $index,
                'status' => 'pending',
            ]);
        }
    }
}
