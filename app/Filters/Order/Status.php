<?php


namespace App\Filters\Order;


use App\Filters\Filter;
use App\Models\Order;

class Status extends Filter
{
    protected function applyFilter($builder)
    {
        $keyword = request($this->filterName());

        if ($keyword == Order::ACCEPT) {
            return $builder->where('status', '=', Order::ACCEPT);
        }
        elseif ($keyword == Order::PENDING) {
            return $builder->where('status', '=', Order::PENDING);
        }else{
            return $builder;
        }
    }
}
