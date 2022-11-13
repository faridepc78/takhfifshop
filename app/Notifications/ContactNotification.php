<?php

namespace App\Notifications;

use App\Channels\SmsChannel;
use Illuminate\Notifications\Notification;

class ContactNotification extends Notification
{
    private $admin_full_name;
    private $contact_code;

    public function __construct($admin_full_name, $contact_code)
    {
        $this->admin_full_name = $admin_full_name;
        $this->contact_code = $contact_code;
    }

    public function via($notifiable)
    {
        return [SmsChannel::class];
    }

    public function toSms($notifiable)
    {
        return $this->admin_full_name . ' ' . 'عزیز' .
            "\r\n" .
            'تماس با کد: ' .
            $this->contact_code .
            "\r\n" .
            'ثبت شد برای مشاهده به پنل مدیریت مراجعه کنید';
    }
}
