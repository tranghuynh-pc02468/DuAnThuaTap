<?php

namespace App\Http\Requests;

use http\Message;
use Illuminate\Foundation\Http\FormRequest;

class StorePackagingSpecificationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|unique:packaging_specifications,name',
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "Vui lòng không bỏ trống!",
            "name.unique" => "Tên đã tồn tại",
        ];
    }
}
