<?php

namespace App\Http\Requests\Admin\Product\Excel;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class ImportRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check() == true && auth()->user()['role'] == User::ADMIN;
    }

    public function rules()
    {
        return [
            'group_id' => ['required', 'exists:groups,id'],
            'file' => ['required', 'mimes:xlsx,xls', 'max:5120']
        ];
    }

    public function attributes()
    {
        return [
            'group_id' => 'گروه محصولات',
            'file' => 'فایل محصولات'
        ];
    }
}
