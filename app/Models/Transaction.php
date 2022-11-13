<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';

    protected $guarded =
        [
            'id',
            'created_at',
            'updated_at'
        ];

    protected $fillable =
        [
            'payment_id',
            'user_id',
            'user_ip',
            'order_id',
            'paid',
            'transaction_id',
            'status',
            'type',
            'invoice_details',
            'transaction_result'
        ];

    const S_SUCCESS = 's_success';
    const S_FAIL = 's_fail';
    const S_PENDING = 's_pending';
    const S_CANCEL = 's_cancel';
    static $statuses =
        [
            self::S_SUCCESS,
            self::S_FAIL,
            self::S_PENDING,
            self::S_CANCEL
        ];

    const T_SAMAN = 'saman';
    const T_SEPEHR = 'sepehr';
    static $types =
        [
            self::T_SAMAN,
            self::T_SEPEHR
        ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id')->withDefault();
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id')->withDefault();
    }

    public function scopeTransaction()
    {
        return $this->transaction_id !== null ? $this->transaction_id : 'ندارد';
    }

    public function getInvoiceDetailsAttribute()
    {
        return unserialize($this->attributes['invoice_details']);
    }

    public function setInvoiceDetailsAttribute($value)
    {
        $this->attributes['invoice_details'] = serialize($value);
    }

    public function getTransactionResultAttribute()
    {
        return unserialize($this->attributes['transaction_result']);
    }

    public function setTransactionResultAttribute($value)
    {
        $this->attributes['transaction_result'] = serialize($value);
    }
}
