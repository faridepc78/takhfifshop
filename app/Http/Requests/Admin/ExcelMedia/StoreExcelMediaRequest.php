<?php

namespace App\Http\Requests\Admin\ExcelMedia;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class StoreExcelMediaRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check() == true && auth()->user()['role'] == User::ADMIN;
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'media' => ['required', 'mimes:jpg,png,jpeg,pdf', 'max:5120']
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'نام مدیا اکسل',
            'media' => 'مدیا اکسل'
        ];
    }
}
