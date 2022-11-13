<?php

namespace App\Repositories;

use App\Filters\Order\Search;
use App\Filters\Order\Status;
use App\Filters\Order\Type;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Pipeline\Pipeline;

class OrderRepository
{
    public function storeOrder($values)
    {
        return Order::query()
            ->create([
                'user_id' => $values['user_id'],
                'province_id' => $values['province_id'],
                'city_id' => $values['city_id'],
                'address' => $values['address'],
                'phone' => $values['phone'],
                'code' => randomNumbers(10)
            ]);
    }

    public function storeOrderItem($order_id, $values)
    {
        return OrderItem::query()
            ->create([
                'order_id' => $order_id,
                'product_id' => $values['product_id'],
                'price' => $values['price'],
                'count' => $values['count']
            ]);
    }

    public function findById($id)
    {
        return Order::query()
            ->findOrFail($id);
    }

    public function findByItemId($id)
    {
        return OrderItem::query()
            ->findOrFail($id);
    }

    public function updateItem($values, $id)
    {
        return OrderItem::query()
            ->where('id', '=', $id)
            ->update([
                'price' => $values['price'],
                'count' => $values['count']
            ]);
    }

    public function update($values, $id)
    {
        return Order::query()
            ->where('id', '=', $id)
            ->update([
                'message' => $values['message']
            ]);
    }

    public function updateStatus($status, $id)
    {
        return Order::query()
            ->where('id', '=', $id)
            ->update([
                'status' => $status
            ]);
    }

    public function paginatePendingBySearch()
    {
        return app(Pipeline::class)
            ->send(Order::query())
            ->through([
                Search::class
            ])
            ->thenReturn()
            ->whereIn('status', [Order::PENDING, Order::UPDATED])
            ->latest()
            ->paginate(10);
    }

    public function paginateByFilters()
    {
        return app(Pipeline::class)
            ->send(Order::query())
            ->through([
                Status::class,
                Type::class,
                Search::class
            ])
            ->thenReturn()
            ->latest()
            ->paginate(10);
    }

    public function paginateForUserIdByFilters($user_id)
    {
        return app(Pipeline::class)
            ->send(Order::query())
            ->through([
                Status::class,
                Type::class,
                Search::class
            ])
            ->thenReturn()
            ->where('user_id', '=', $user_id)
            ->where('status', '!=', Order::UPDATED)
            ->latest()
            ->paginate(10);
    }

    public function getAllItemsByOrderId($order_id, $no_paginate = null)
    {
        if ($no_paginate == true) {
            return OrderItem::query()
                ->where('order_id', '=', $order_id)
                ->where('status', '=', OrderItem::AVAILABLE)
                ->latest()
                ->get();
        } else {
            return OrderItem::query()
                ->where('order_id', '=', $order_id)
                ->latest()
                ->paginate(10);
        }
    }

    public function updateStatusOrderItem($id, $status)
    {
        return OrderItem::query()
            ->where('id', '=', $id)
            ->update([
                'status' => $status
            ]);
    }
}
