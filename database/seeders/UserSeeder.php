<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        if (!User::query()->where('role', '=', User::ADMIN)->count()) {
            User::query()->firstOrCreate([
                'f_name' => 'فرید',
                'l_name' => 'شیشه بری',
                'mobile' => '09123456789',
                'password' => bcrypt('12345678'),
                'status' => User::ACTIVE,
                'role' => User::ADMIN
            ]);
        }
    }
}
