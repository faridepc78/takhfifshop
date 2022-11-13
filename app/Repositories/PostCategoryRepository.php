<?php

namespace App\Repositories;

use App\Models\PostCategory;

class PostCategoryRepository
{
    public function store($values)
    {
        return PostCategory::query()
            ->create([
                'name' => $values['name'],
                'slug' => $values['slug']
            ]);
    }

    public function paginate()
    {
        return PostCategory::query()
            ->latest()
            ->paginate(10);
    }

    public function findById($id)
    {
        return PostCategory::query()
            ->findOrFail($id);
    }

    public function update($values, $id)
    {
        return PostCategory::query()
            ->where('id', '=', $id)
            ->update([
                'name' => $values['name'],
                'slug' => $values['slug']
            ]);
    }

    public function getAll()
    {
        return PostCategory::query()
            ->latest()
            ->get();
    }
}
