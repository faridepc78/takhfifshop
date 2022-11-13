<?php

namespace App\Notifications;

use App\Channels\SmsChannel;
use Illuminate\Notifications\Notification;

class InquiryNotification extends Notification
{
    private $admin_full_name;
    private $inquiry_code;

    public function __construct($admin_full_name, $inquiry_code)
    {
        $this->admin_full_name = $admin_full_name;
        $this->inquiry_code = $inquiry_code;
    }

    public function via($notifiable)
    {
        return [SmsChannel::class];
    }

    public function toSms($notifiable)
    {
        return $this->admin_full_name . ' ' . 'عزیز' .
            "\r\n" .
            'درخواست استعلام با کد: ' .
            $this->inquiry_code .
            "\r\n" .
            'ثبت شد برای مشاهده به پنل مدیریت مراجعه کنید';
    }
}
