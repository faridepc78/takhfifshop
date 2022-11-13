<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $guarded =
        [
            'id',
            'created_at',
            'updated_at'
        ];

    protected $fillable =
        [
            'user_id',
            'province_id',
            'city_id',
            'address',
            'phone',
            'code',
            'message',
            'status',
            'type'
        ];

    const ACCEPT = 'accept';
    const PENDING = 'pending';
    const UPDATED = 'updated';
    static $statuses =
        [
            self::ACCEPT,
            self::PENDING,
            self::UPDATED
        ];

    const PAID = 'paid';
    const UNPAID = 'unpaid';
    static $types =
        [
            self::PAID,
            self::UNPAID
        ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id')->withDefault();
    }

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id', 'id')->withDefault();
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'id')->withDefault();
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class, 'order_id', 'id');
    }

    public function scopePrice()
    {
        return $this->items()->sum('price');
    }
}
