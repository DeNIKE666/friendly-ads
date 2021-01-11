<?php


namespace App\Service;

use Illuminate\Notifications\Notification;

class NotifyMessenger
{
    public function send($notifiable, Notification $notification)
    {
        $notification->toNotifyMessenger($notifiable);
    }
}