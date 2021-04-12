<?php

namespace App\Channels;

use Illuminate\Notifications\Notification;

class SmsChannel
{
    public function send($notifiable, Notification $notification)
    {

        $phone = $notifiable->routeNotificationForSms($notifiable);

        $data = $notification->toSms($notifiable);
        if (empty($data)) {
            return;
        }
        app('log')->info(json_encode([
            'phone' => $phone,
            'sms' => $data,
        ]));
        return true;
    }
}
