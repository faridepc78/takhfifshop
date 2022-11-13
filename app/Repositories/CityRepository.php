<?php

namespace App\Repositories;

use App\Models\City;

class CityRepository
{
    public function findByProvinceId($province_id)
    {
        return City::query()
            ->where('province_id', '=', $province_id)
            ->orderBy('id', 'asc')
            ->get(['id','name']);
    }
}
