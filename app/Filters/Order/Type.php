<?php


namespace App\Filters\Order;


use App\Filters\Filter;
use App\Models\Order;

class Type extends Filter
{
    protected function applyFilter($builder)
    {
        $keyword = request($this->filterName());

        if ($keyword == Order::PAID) {
            return $builder->where('type', '=', Order::PAID);
        } elseif ($keyword == Order::UNPAID) {
            return $builder->where('type', '=', Order::UNPAID);
        } else {
            return $builder;
        }
    }
}
