<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\NotificationType;

class UserNotificationSeeder extends Seeder
{
    public function run()
    {
        // Get all users and notification types
        $users = User::all();
        $notificationTypes = NotificationType::all();

        // Randomly assign notification types to users
        foreach ($users as $user) {
            $user->notificationTypes()->attach(
                $notificationTypes->random(rand(1, 3))->pluck('id')->toArray()
            );
        }
    }
}
