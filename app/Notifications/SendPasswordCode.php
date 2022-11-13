<?php

namespace App\Notifications;

use App\Channels\SmsChannel;
use Illuminate\Notifications\Notification;

class SendPasswordCode extends Notification
{
    private $password;

    public function __construct($password)
    {
        $this->password = $password;
    }

    public function via($notifiable)
    {
        return [SmsChannel::class];
    }

    public function toSms($notifiable)
    {
        return 'تخفیف سنسور' .
            "\r\n" .
            'رمز عبور: ' .
            "\r\n" .
            $this->password;
    }
}
