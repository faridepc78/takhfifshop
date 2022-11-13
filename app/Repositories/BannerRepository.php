<?php

namespace App\Repositories;

use App\Models\Banner;

class BannerRepository
{
    public function store($values)
    {
        return Banner::query()
            ->create([
                'name' => $values['name'],
                'url' => $values['url'],
                'image_id' => null,
                'type' => $values['type']
            ]);
    }

    public function addImage($image_id, $id)
    {
        return Banner::query()
            ->where('id', '=', $id)
            ->update([
                'image_id' => $image_id
            ]);
    }

    public function paginate()
    {
        return Banner::query()
            ->latest()
            ->paginate(10);
    }

    public function findById($id)
    {
        return Banner::query()
            ->findOrFail($id);
    }

    public function update($values, $image_id, $id)
    {
        return Banner::query()
            ->where('id', '=', $id)
            ->update([
                'name' => $values['name'],
                'url' => $values['url'],
                'image_id' => $image_id,
                'type' => $values['type']
            ]);
    }

    public function getAll()
    {
        return Banner::query()
            ->latest()
            ->get();
    }
}
