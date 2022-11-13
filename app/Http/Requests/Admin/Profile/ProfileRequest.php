<?php

namespace App\Http\Requests\Admin\Profile;

use App\Models\User;
use App\Rules\ValidationMobile;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ProfileRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check() == true && auth()->user()['role'] == User::ADMIN;
    }

    public function rules()
    {
        return [
            'f_name' => ['required', 'string', 'max:255'],
            'l_name' => ['required', 'string', 'max:255'],
            'mobile' => ['required', 'numeric', 'digits:11', 'unique:users,mobile,' . Auth::id(), new ValidationMobile()],
            'password' => ['nullable', 'string', 'min:8', 'confirmed']
        ];
    }

    public function attributes()
    {
        return [
            'f_name' => 'نام',
            'l_name' => 'نام خانوادگی',
            'mobile' => 'تلفن همراه',
            'password' => 'رمز عبور'
        ];
    }
}
