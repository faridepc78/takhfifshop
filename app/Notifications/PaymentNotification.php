<?php

namespace App\Notifications;

use App\Channels\SmsChannel;
use App\Models\User;
use Illuminate\Notifications\Notification;

class PaymentNotification extends Notification
{
    private $user_full_name;
    private $order_code;
    private $payment_id;
    private $price;
    private $type;
    private $admin_full_name;

    public function __construct($user_full_name, $order_code,
                                $payment_id, $price, $type,
                                $admin_full_name = null)
    {
        $this->user_full_name = $user_full_name;
        $this->order_code = $order_code;
        $this->payment_id = $payment_id;
        $this->price = $price;
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
                'تراکنش با کد: ' .
                $this->payment_id .
                "\r\n" .
                'به مبلغ: ' .
                number_format($this->price) .
                ' تومان' .
                "\r\n" .
                'تراکنش خود را با موفقیت انجام داد برای مشاهده جزئیات تراکنش به پنل مدیریت مراجع کنید';
        } elseif ($this->type == User::USER) {
            return $this->user_full_name . ' ' . 'عزیز' .
                "\r\n" .
                'سفارش شما با کد: ' .
                $this->order_code .
                "\r\n" .
                'تراکنش با کد: ' .
                $this->payment_id .
                "\r\n" .
                'به مبلغ: ' .
                number_format($this->price) .
                "\r\n" .
                'ثبت و پرداخت شد برای اطلاع از زمان تحویل کالا با مدیریت تماس بگیرید';
        }
    }
}
