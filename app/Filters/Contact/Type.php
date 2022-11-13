<?php


namespace App\Filters\Contact;


use App\Filters\Filter;
use App\Models\ContactUs;

class Type extends Filter
{
    protected function applyFilter($builder)
    {
        $keyword = request($this->filterName());

        if ($keyword == ContactUs::READ) {
            return $builder->where('type', '=', ContactUs::READ);
        } elseif ($keyword == ContactUs::UNREAD) {
            return $builder->where('type', '=', ContactUs::UNREAD);
        } else {
            return $builder;
        }
    }
}
