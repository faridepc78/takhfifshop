<?php

namespace App\Repositories;

use App\Filters\User\Search;
use App\Models\User;
use Illuminate\Pipeline\Pipeline;

class UserRepository
{
    public function paginate()
    {
        return app(Pipeline::class)
            ->send(User::query())
            ->through([
                Search::class
            ])
            ->thenReturn()
            ->where('role', '=', User::USER)
            ->latest()
            ->paginate(10);
    }

    public function store($values)
    {
        return User::query()
            ->create([
                'f_name' => $values['f_name'],
                'l_name' => $values['l_name'],
                'mobile' => $values['mobile'],
                'password' => bcrypt($values['password']),
                'status' => $values['status'],
                'role' => User::USER
            ]);
    }

    public function findById($id)
    {
        return User::query()
            ->findOrFail($id);
    }

    public function update($values, $id)
    {
        return User::query()
            ->where('id', '=', $id)
            ->update([
                'f_name' => $values['f_name'],
                'l_name' => $values['l_name'],
                'mobile' => $values['mobile']
            ]);
    }

    public function updatePassword($password, $id)
    {
        return User::query()
            ->where('id', '=', $id)
            ->update([
                'password' => bcrypt($password)
            ]);
    }

    public function verify($id)
    {
        return User::query()
            ->where('id', '=', $id)
            ->update([
                'status' => User::ACTIVE
            ]);
    }

    public function findByMobile($mobile)
    {
        return User::query()
            ->where('mobile', '=', $mobile)
            ->firstOrFail();
    }

    public function getAdmin()
    {
        return User::query()
            ->where('role', '=', User::ADMIN)
            ->first();
    }
}
