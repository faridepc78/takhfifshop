<?php

namespace App\Repositories;

use App\Filters\Contact\Search;
use App\Filters\Contact\Type;
use App\Models\ContactUs;
use Illuminate\Pipeline\Pipeline;

class ContactUsRepository
{
    public function store($values)
    {
        return ContactUs::query()
            ->create([
                'f_name' => $values['f_name'],
                'l_name' => $values['l_name'],
                'mobile' => $values['mobile'],
                'user_id' => $values['user_id'],
                'subject' => $values['subject'],
                'text' => $values['text'],
                'code' => randomNumbers(5)
            ]);
    }

    public function paginate()
    {
        return app(Pipeline::class)
            ->send(ContactUs::query())
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
        return ContactUs::query()
            ->findOrFail($id);
    }

    public function updateType($id)
    {
        return ContactUs::query()
            ->where('id', '=', $id)
            ->update([
                'type' => ContactUs::READ
            ]);
    }
}
