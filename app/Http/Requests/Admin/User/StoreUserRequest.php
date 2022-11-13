<?php

namespace App\Http\Requests\Admin\User;

use App\Models\User;
use App\Rules\ValidationMobile;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check() == true && auth()->user()['role'] == User::ADMIN;
    }

    public function prepareForValidation()
    {
        return $this->merge([
            'status' => User::ACTIVE
        ]);
    }

    public function rules()
    {
        return [
            'f_name' => ['required', 'string', 'max:255'],
            'l_name' => ['required', 'string', 'max:255'],
            'mobile' => ['required', 'numeric', 'digits:11', 'unique:users,mobile', new ValidationMobile()],
            'password' => ['required', 'string', 'min:8']
        ];
    }

    public function attributes()
    {
        return [
            'f_name' => 'نام کاربر',
            'l_name' => 'نام خانوادگی کاربر',
            'mobile' => 'تلفن همراه کاربر',
            'password' => 'رمز عبور کاربر'
        ];
    }
}
