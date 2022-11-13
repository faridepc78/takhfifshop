<?php

namespace App\Notifications;

use App\Channels\SmsChannel;
use Illuminate\Notifications\Notification;

class SendActiveCode extends Notification
{
    private $active_code;

    public function __construct($active_code)
    {
        $this->active_code = $active_code;
    }

    public function via($notifiable)
    {
        return [SmsChannel::class];
    }

    public function toSms($notifiable)
    {
        return 'تخفیف سنسور' .
            "\r\n" .
            'کد فعالسازی: ' .
            "\r\n" .
            $this->active_code;
    }
}
