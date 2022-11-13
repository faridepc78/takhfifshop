<?php

namespace App\Repositories;

use App\Filters\Inquiry\Search;
use App\Filters\Inquiry\Type;
use App\Models\Inquiry;
use Illuminate\Pipeline\Pipeline;

class InquiryRepository
{
    public function store($values)
    {
        return Inquiry::query()
            ->create([
                'user_id' => $values['user_id'],
                'media_id' => null,
                'text' => $values['text'],
                'type' => $values['type'],
                'code' => randomNumbers(5)
            ]);
    }

    public function addMedia($media_id, $id)
    {
        return Inquiry::query()
            ->where('id', '=', $id)
            ->update([
                'media_id' => $media_id
            ]);
    }

    public function paginate()
    {
        return app(Pipeline::class)
            ->send(Inquiry::query())
            ->through([
                Type::class,
                Search::class
            ])
            ->thenReturn()
            ->orderBy('type', 'desc')
            ->orderBy('id', 'desc')
            ->paginate(10);
    }

    public function findById($id)
    {
        return Inquiry::query()
            ->findOrFail($id);
    }

    public function updateType($id)
    {
        return Inquiry::query()
            ->where('id', '=', $id)
            ->update([
                'type' => Inquiry::READ
            ]);
    }
}
