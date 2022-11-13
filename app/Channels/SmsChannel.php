<?php

namespace App\Channels;

use Amirbagh75\SMSIR\Facades\SMSIR;
use Illuminate\Notifications\Notification;

class SmsChannel
{
    public function send($notifiable, Notification $notification)
    {
        $message = $notification->toSms($notifiable);
        $user_mobile = $notifiable->mobile;
        SMSIR::send([$message], [$user_mobile]);
    }
}
