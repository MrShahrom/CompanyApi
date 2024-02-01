<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name' => ['required', 'string'],
            'id_sklad' => ['required', 'integer'],
            'selling_price' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2,3,4})?$/'],
            'id_type_product' => ['required', 'integer'],
            'quantity' => ['required', 'integer'],
            'status' => ['required', 'boolean'],
        ];
    }
}
