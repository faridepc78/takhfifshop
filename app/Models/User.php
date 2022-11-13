<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';

    protected $guarded =
        [
            'id',
            'created_at',
            'updated_at'
        ];

    protected $fillable =
        [
            'f_name',
            'l_name',
            'mobile',
            'password',
            'status',
            'role',
            'remember_token'
        ];

    const ADMIN = 'admin';
    const USER = 'user';
    static $roles =
        [
            self::ADMIN,
            self::USER
        ];

    const ACTIVE = 'active';
    const INACTIVE = 'inactive';
    static $statuses =
        [
            self::ACTIVE,
            self::INACTIVE
        ];

    public function getFullNameAttribute()
    {
        return $this->f_name . ' ' . $this->l_name;
    }

    public function code()
    {
        return $this->belongsTo(UserCode::class, 'id', 'user_id')->withDefault();
    }

    public function verify()
    {
        return $this->status == User::ACTIVE ? true : false;
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id', 'id');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'user_id', 'id');
    }
}
