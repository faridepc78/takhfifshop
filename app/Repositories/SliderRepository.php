<?php

namespace App\Repositories;

use App\Models\Slider;

class SliderRepository
{
    public function store($values)
    {
        return Slider::query()
            ->create([
                'name' => $values['name'],
                'url' => $values['url'],
                'image_id' => null
            ]);
    }

    public function addImage($image_id, $id)
    {
        return Slider::query()
            ->where('id', '=', $id)
            ->update([
                'image_id' => $image_id
            ]);
    }

    public function paginate()
    {
        return Slider::query()
            ->latest()
            ->paginate(10);
    }

    public function findById($id)
    {
        return Slider::query()
            ->findOrFail($id);
    }

    public function update($values, $image_id, $id)
    {
        return Slider::query()
            ->where('id', '=', $id)
            ->update([
                'name' => $values['name'],
                'url' => $values['url'],
                'image_id' => $image_id
            ]);
    }

    public function getAll()
    {
        return Slider::query()
            ->latest()
            ->get();
    }
}
