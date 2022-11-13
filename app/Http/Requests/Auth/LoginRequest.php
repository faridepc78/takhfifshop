<?php

namespace App\Http\Requests\Auth;

use App\Rules\ValidationMobile;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'mobile' => ['required', 'numeric', 'digits:11', new ValidationMobile()],
            'password' => ['required', 'string']
        ];
    }

    public function attributes()
    {
        return [
            'mobile' => 'تلفن همراه',
            'password' => 'رمز عبور'
        ];
    }
}
