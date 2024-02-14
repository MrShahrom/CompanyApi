<?php

namespace App\Http\Requests\RawMaterial;

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
            'unit' => ['required', 'string'],
            'quantity' => ['required', 'integer'],
            'purchase_price' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2,3,4})?$/'],
            'units_of_measurement' => ['required', 'integer'],
            'id_supplier' => ['required', 'integer'],
            'date' => ['required', 'date_format:Y-m-d H:i:s'],
            'description' => ['required', 'string'],
            'status' => ['required', 'boolean'],
        ];
    }
}
