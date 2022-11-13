<?php

namespace App\Notifications;

use App\Channels\SmsChannel;
use App\Models\User;
use Illuminate\Notifications\Notification;

class RegisterOrder extends Notification
{
    private $user_full_name;
    private $order_code;
    private $type;
    private $admin_full_name;

    public function __construct($user_full_name, $order_code,
                                $type, $admin_full_name = null)
    {
        $this->user_full_name = $user_full_name;
        $this->order_code = $order_code;
        $this->type = $type;
        $this->admin_full_name = $admin_full_name;
    }

    public function via($notifiable)
    {
        return [SmsChannel::class];
    }

    public function toSms($notifiable)
    {
        if ($this->type == User::ADMIN) {
            return $this->admin_full_name . ' ' . 'عزیز' .
                "\r\n" .
                'کاربر با نام: ' .
                $this->user_full_name .
                "\r\n" .
                'سفارش با کد: ' .
                $this->order_code .
                "\r\n" .
                'ثبت شد لطفا سفارش را از طریق پنل مدیریت مشاهده و برسی بفرمایید';
        } elseif ($this->type == User::USER) {
            return $this->user_full_name . ' ' . 'عزیز' .
                "\r\n" .
                'سفارش شما با کد: ' .
                $this->order_code .
                "\r\n" .
                'ثبت شد لطفا برای پرداخت نهایی منتظر تایید مدیریت باشید';
        }
    }
}
