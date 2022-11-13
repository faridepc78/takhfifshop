<?php

namespace App\Http\Requests\Site\Inquiry;

use App\Models\Inquiry;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class InquiryRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check() == true;
    }

    public function prepareForValidation()
    {
        return $this->merge([
            'user_id' => Auth::id(),
            'type' => Inquiry::UNREAD
        ]);
    }

    public function rules()
    {
        return [
            'media' => ['required', 'mimes:jpg,png,jpeg,xlsx,xls,pdf', 'max:5120'],
            'text' => ['nullable', 'string']
        ];
    }

    public function attributes()
    {
        return [
            'media' => 'مدیا استعلام',
            'text' => 'توضیحات استعلام'
        ];
    }
}
