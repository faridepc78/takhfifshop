<?php

namespace App\Http\Requests\Admin\Category\Show;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class ShowCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check() == true && auth()->user()['role'] == User::ADMIN;
    }

    public function rules()
    {
        return [
            'category_id' => ['required', 'exists:categories,id']
        ];
    }

    public function attributes()
    {
        return [
            'category_id' => 'دسته بندی'
        ];
    }
}
