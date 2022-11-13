<?php

namespace App\Http\Requests\Admin\Group;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class GroupRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check() == true && auth()->user()['role'] == User::ADMIN;
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255', 'unique:groups,name']
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'نام گروه'
        ];
    }
}
