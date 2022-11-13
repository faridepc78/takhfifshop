<?php

namespace App\Notifications;

use App\Channels\SmsChannel;
use App\Models\Order;
use Illuminate\Notifications\Notification;

class ConfirmOrder extends Notification
{
    private $user_full_name;
    private $type;
    private $order_code;

    public function __construct($user_full_name, $type, $order_code)
    {
        $this->user_full_name = $user_full_name;
        $this->type = $type;
        $this->order_code = $order_code;
    }

    public function via($notifiable)
    {
        return [SmsChannel::class];
    }

    public function toSms($notifiable)
    {
        if ($this->type == Order::ACCEPT) {
            return $this->user_full_name . ' ' . 'عزیز' .
                "\r\n" .
                'سفارش شما با کد: ' .
                $this->order_code .
                "\r\n" .
                'سفارش شما توسط مدیریت تایید شد هم اکنون می توانید از طریق پنل کاربری خود پرداخت را انجام دهید';
        } elseif ($this->type == Order::UPDATED) {
            return $this->user_full_name . ' ' . 'عزیز' .
                "\r\n" .
                'سفارش شما با کد: ' .
                $this->order_code .
                "\r\n" .
                'با تغییراتی توسط مدیریت تایید شد هم اکنون می توانید از طریق پنل کاربری خود پرداخت را انجام دهید';
        }
    }
}
