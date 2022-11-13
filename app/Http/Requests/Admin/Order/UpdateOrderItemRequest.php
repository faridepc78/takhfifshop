<?php

namespace App\Http\Requests\Admin\Order;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class UpdateOrderItemRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check() == true && auth()->user()['role'] == User::ADMIN;
    }

    public function prepareForValidation()
    {
        return $this->merge([
            'price' => str_replace(',', '', request('price')),
            'count' => str_replace(',', '', request('count'))
        ]);
    }

    public function rules()
    {
        return [
            'price' => ['required', 'numeric', 'min:1000'],
            'count' => ['required', 'numeric', 'min:1'],
            'message'=>['nullable','string']
        ];
    }

    public function attributes()
    {
        return [
            'price' => 'قیمت محصول',
            'count'=>'تعداد محصول',
            'message'=>'توضیحات سفارش'
        ];
    }
}
