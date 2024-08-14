<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\NotificationType;

class NotificationTypeSeeder extends Seeder
{
    public function run()
    {
        $types = ['email', 'alert', 'news', 'update'];

        foreach ($types as $type) {
            NotificationType::create(['type' => $type]);
        }
    }
}
