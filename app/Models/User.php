<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
    ];

    public function notificationTypes()
    {
        return $this->belongsToMany(NotificationType::class, 'user_notifications');
    }

    public function notifications()
    {
        return $this->belongsToMany(Notification::class, 'notification_user');
    }
}
