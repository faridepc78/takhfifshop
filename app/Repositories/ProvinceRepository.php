<?php

namespace App\Repositories;

use App\Models\Province;

class ProvinceRepository
{
    public function getAll()
    {
        return Province::query()
            ->orderBy('id', 'asc')
            ->get();
    }
}
