<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});Route::get('/test-notification', [App\Http\Controllers\NotificationController::class, 'sendNotifications']);

