<?php

namespace App\Repositories;

use App\Models\Group;

class GroupRepository
{
    public function store($values)
    {
        return Group::query()
            ->create([
                'name' => $values['name'],
                'excel_id' => null
            ]);
    }

    public function addExcel($excel_id, $id)
    {
        return Group::query()
            ->where('id', '=', $id)
            ->update([
                'excel_id' => $excel_id
            ]);
    }

    public function paginate()
    {
        return Group::query()
            ->latest()
            ->paginate(10);
    }

    public function findById($id)
    {
        return Group::query()
            ->findOrFail($id);
    }

    public function getAll()
    {
        return Group::all();
    }
}
