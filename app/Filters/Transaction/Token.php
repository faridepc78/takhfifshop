<?php


namespace App\Filters\Transaction;


use App\Filters\Filter;

class Token extends Filter
{
    protected function applyFilter($builder)
    {
        $keyword = request($this->filterName());

        if ($keyword != null) {
            return $builder->where('payment_id', request($this->filterName()));
        } else {
            return $builder;
        }
    }
}
