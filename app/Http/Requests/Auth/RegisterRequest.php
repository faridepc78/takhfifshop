<?php

namespace App\Http\Requests\Auth;

use App\Models\User;
use App\Rules\ValidationMobile;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function prepareForValidation()
    {
        return $this->merge([
            'password' => request('mobile'),
            'status' => User::INACTIVE
        ]);
    }

    public function rules()
    {
        return [
            'f_name' => ['required', 'string', 'max:255'],
            'l_name' => ['required', 'string', 'max:255'],
            'mobile' => ['required', 'numeric', 'digits:11', 'unique:users,mobile', new ValidationMobile()]
        ];
    }

    public function attributes()
    {
        return [
            'f_name' => 'نام',
            'l_name' => 'نام خانوادگی',
            'mobile' => 'تلفن همراه'
        ];
    }
}
