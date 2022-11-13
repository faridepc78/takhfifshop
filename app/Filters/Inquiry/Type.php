<?php


namespace App\Filters\Inquiry;


use App\Filters\Filter;
use App\Models\Inquiry;

class Type extends Filter
{
    protected function applyFilter($builder)
    {
        $keyword = request($this->filterName());

        if ($keyword == Inquiry::READ) {
            return $builder->where('type', '=', Inquiry::READ);
        } elseif ($keyword == Inquiry::UNREAD) {
            return $builder->where('type', '=', Inquiry::UNREAD);
        } else {
            return $builder;
        }
    }
}
