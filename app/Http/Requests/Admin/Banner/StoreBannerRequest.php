<?php

namespace App\Http\Requests\Admin\Banner;

use App\Models\Banner;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreBannerRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check() == true && auth()->user()['role'] == User::ADMIN;
    }

    public function rules()
    {
        return [
            'name' => ['nullable', 'string', 'max:255'],
            'url' => ['nullable', 'url'],
            'image' => ['required', 'mimes:jpg,png,jpeg', 'max:5120'],
            'type' => ['required', Rule::in(Banner::$types)]
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'نام بنر',
            'url' => 'لینک بنر',
            'image' => 'تصویر بنر',
            'type' => 'نوع بنر'
        ];
    }
}
