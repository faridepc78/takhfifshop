<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Lang;

class OrderItem extends Model
{
    protected $table = 'orders_items';

    protected $guarded =
        [
            'id',
            'created_at',
            'updated_at'
        ];

    protected $fillable =
        [
            'order_id',
            'product_id',
            'price',
            'count',
            'status'
        ];

    const AVAILABLE = 'available';
    const UNAVAILABLE = 'unavailable';
    static $statuses =
        [
            self::AVAILABLE,
            self::UNAVAILABLE
        ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id')->withDefault();
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id')->withDefault();
    }

    public function status()
    {
        if ($this->status == OrderItem::AVAILABLE) {
            return '<td class="alert alert-success">'.Lang::get(self::AVAILABLE).'</td>';
        } elseif ($this->status == OrderItem::UNAVAILABLE) {
            return '<td class="alert alert-danger">'.Lang::get(self::UNAVAILABLE).'</td>';
        }
    }
}
