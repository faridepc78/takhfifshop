<?php

namespace App\Http\Requests\Admin\Product;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProductRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check() == true && auth()->user()['role'] == User::ADMIN;
    }

    public function prepareForValidation()
    {
        return $this->merge([
            'slug' => str_slug_persian(request('slug')),
            'price' => str_replace(',', '', request('price')),
            'count' => str_replace(',', '', request('count'))
        ]);
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255'],
            'category_id' => ['required', 'exists:categories,id'],
            'brand_id' => ['required', 'exists:brands,id'],
            'image' => ['nullable', 'mimes:jpg,png,jpeg', 'max:5120'],
            'pdf' => ['nullable', 'mimes:pdf', 'max:5120'],
            'price' => ['required', 'numeric', 'min:1000'],
            'discount' => ['nullable', 'numeric', 'between:1,100'],
            'text' => ['required', 'string'],
            'count' => ['required', 'numeric', 'min:1'],
            'status' => ['required', Rule::in(Product::$statuses)]
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'نام محصول',
            'slug' => 'اسلاگ محصول',
            'category_id' => 'دسته بندی محصول',
            'brand_id' => 'برند محصول',
            'image' => 'تصویر محصول',
            'pdf' => 'پی دی اف محصول',
            'price' => 'قیمت محصول',
            'discount' => 'درصد تخفیف محصول',
            'text' => 'توضیحات محصول',
            'count' => 'تعداد موجودی محصول',
            'status' => 'وضعیت محصول'
        ];
    }
}
