<?php


namespace App\Filters\Transaction;


use App\Filters\Filter;
use App\Models\Transaction;

class Status extends Filter
{
    protected function applyFilter($builder)
    {
        $keyword = request($this->filterName());

        if ($keyword == Transaction::S_SUCCESS) {
            return $builder->where('status', '=', Transaction::S_SUCCESS);
        } elseif ($keyword == Transaction::S_FAIL) {
            return $builder->where('status', '=', Transaction::S_FAIL);
        } elseif ($keyword == Transaction::S_PENDING) {
            return $builder->where('status', '=', Transaction::S_PENDING);
        } elseif ($keyword == Transaction::S_CANCEL) {
            return $builder->where('status', '=', Transaction::S_CANCEL);
        } else {
            return $builder;
        }
    }
}
