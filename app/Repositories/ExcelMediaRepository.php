<?php

namespace App\Repositories;

use App\Filters\ExcelMedia\Search;
use App\Models\ExcelMedia;
use Illuminate\Pipeline\Pipeline;

class ExcelMediaRepository
{
    public function store($values)
    {
        return ExcelMedia::query()
            ->create([
                'name' => $values['name'],
                'media_id' => null
            ]);
    }

    public function addMedia($media_id, $id)
    {
        return ExcelMedia::query()
            ->where('id', '=', $id)
            ->update([
                'media_id' => $media_id
            ]);
    }

    public function paginateByFilters()
    {
        return app(Pipeline::class)
            ->send(ExcelMedia::query())
            ->through([
                Search::class
            ])
            ->thenReturn()
            ->latest()
            ->paginate(10);
    }

    public function findById($id)
    {
        return ExcelMedia::query()
            ->findOrFail($id);
    }

    public function update($values, $media_id, $id)
    {
        return ExcelMedia::query()
            ->where('id', '=', $id)
            ->update([
                'name' => $values['name'],
                'media_id' => $media_id
            ]);
    }

    public function checkMediaId($id)
    {
        return ExcelMedia::query()
            ->where('media_id', '=', $id)
            ->exists();
    }
}
