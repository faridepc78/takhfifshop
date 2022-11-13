<?php

namespace App\Http\Requests\Site\ContactUs;

use App\Rules\ValidationMobile;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ContactUsRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function prepareForValidation()
    {
        if (Auth::check()) {
            return $this->merge([
                'user_id' => Auth::id()
            ]);
        }
    }

    public function rules()
    {
        if (Auth::check()) {
            return [
                'subject' => ['required', 'string', 'max:255'],
                'text' => ['required', 'string']
            ];
        } else {
            return [
                'f_name' => ['required', 'string', 'max:255'],
                'l_name' => ['required', 'string', 'max:255'],
                'mobile' => ['required', 'numeric', 'digits:11', new ValidationMobile()],
                'subject' => ['required', 'string', 'max:255'],
                'text' => ['required', 'string']
            ];
        }
    }

    public function attributes()
    {
        return [
            'f_name' => 'نام',
            'l_name' => 'نام خانوادگی',
            'mobile' => 'تلفن همراه',
            'subject' => 'موضوع',
            'text' => 'پیام'
        ];
    }
}
