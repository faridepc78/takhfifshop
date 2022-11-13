<?php

namespace App\Repositories;

use App\Models\Order;
use App\Models\Post;
use App\Models\Product;
use App\Models\User;

class StatisticsRepository
{
    public function getCountProducts()
    {
        return Product::query()
            ->where('status','=',Product::ACTIVE)
            ->count();
    }

    public function getCountUsers()
    {
        return User::query()
            ->where('status','=',User::ACTIVE)
            ->count();
    }

    public function getCountPosts()
    {
        return Post::query()
            ->where('status','=',Post::ACTIVE)
            ->count();
    }

    public function getCountOrders()
    {
        return Order::query()->count();
    }
}
