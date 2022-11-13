<?php

namespace App\Repositories;

use App\Models\Category;
use App\Models\ShowCategory;

class CategoryRepository
{
    public function store($values)
    {
        return Category::query()
            ->create([
                'name' => $values['name'],
                'slug' => $values['slug'],
                'parent_id' => $values['parent_id'],
                'image_id' => null,
                'level' => $values['level']
            ]);
    }

    public function addImage($image_id, $id)
    {
        return Category::query()
            ->where('id', '=', $id)
            ->update([
                'image_id' => $image_id
            ]);
    }

    public function paginate($count = 10)
    {
        return Category::query()
            ->where('parent_id', '=', null)
            ->latest()
            ->paginate($count);
    }

    public function findById($id)
    {
        return Category::query()
            ->findOrFail($id);
    }

    public function findByParentId($parent_id)
    {
        return Category::query()
            ->findOrFail($parent_id);
    }

    public function update($values, $image_id, $id)
    {
        return Category::query()
            ->where('id', '=', $id)
            ->update([
                'name' => $values['name'],
                'slug' => $values['slug'],
                'parent_id' => $values['parent_id'],
                'level' => $values['level'],
                'image_id' => $image_id
            ]);
    }

    public function getParents()
    {
        return Category::query()
            ->where('parent_id', '=', null)
            ->latest()
            ->get();
    }

    public function getSubs($id)
    {
        return Category::query()
            ->where('parent_id', '=', $id)
            ->latest()
            ->paginate(10);
    }

    public function setLevel($parent_id)
    {
        if ($parent_id !== null) {
            $parent_level = $this->findByParentId($parent_id)['level'];

            if ($parent_level == 1) {
                return 2;
            } elseif ($parent_level == 2) {
                return 3;
            }
        } else {
            return 1;
        }
    }

    public function dataByRelations($category_id)
    {
        return Category::with(['products',
            'sub.products',
            'sub.childrenRecursive.products'])
            ->where('id', '=', $category_id)
            ->get()
            ->toArray();
    }

    /*START SHOW*/

    public function storeShow($values)
    {
        return ShowCategory::query()
            ->create([
                'category_id' => $values['category_id']
            ]);
    }

    public function getShow()
    {
        return ShowCategory::query()
            ->latest()
            ->get();
    }

    public function findShowById($id)
    {
        return ShowCategory::query()
            ->findOrFail($id);
    }

    /*END SHOW*/
}
