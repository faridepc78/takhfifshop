<?php

namespace App\Repositories;

use App\Models\Brand;

class BrandRepository
{
    public function store($values)
    {
        return Brand::query()
            ->create([
                'name' => $values['name'],
                'slug' => $values['slug'],
                'image_id' => null
            ]);
    }

    public function addImage($image_id, $id)
    {
        return Brand::query()
            ->where('id', '=', $id)
            ->update([
                'image_id' => $image_id
            ]);
    }

    public function paginate()
    {
        return Brand::query()
            ->latest()
            ->paginate(10);
    }

    public function findById($id)
    {
        return Brand::query()
            ->findOrFail($id);
    }

    public function update($values, $image_id, $id)
    {
        return Brand::query()
            ->where('id', '=', $id)
            ->update([
                'name' => $values['name'],
                'slug' => $values['slug'],
                'image_id' => $image_id
            ]);
    }

    public function getAll()
    {
        return Brand::query()
            ->latest()
            ->get();
    }
}
