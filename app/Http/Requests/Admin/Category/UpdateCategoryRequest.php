<?php

namespace App\Http\Requests\Admin\Category;

use App\Models\User;
use App\Repositories\CategoryRepository;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check() == true && auth()->user()['role'] == User::ADMIN;
    }

    public function prepareForValidation()
    {
        $parent_id = request('parent_id');

        $categoryRepository = new CategoryRepository();
        $level = $categoryRepository->setLevel($parent_id);

        return $this->merge([
            'level' => $level,
            'slug' => str_slug_persian(request('slug'))
        ]);
    }

    public function rules()
    {
        $id = request()->route('category');

        return [
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255'],
            'parent_id' => ['nullable', 'exists:categories,id', 'not_in:' . $id],
            'image' => ['nullable', 'mimes:jpg,png,jpeg', 'max:5120']
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'نام دسته بندی',
            'slug' => 'اسلاگ دسته بندی',
            'parent_id' => 'والد دسته بندی',
            'image' => 'تصویر دسته بندی'
        ];
    }
}
