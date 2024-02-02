<?php

namespace App\Http\Requests\Order;

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
            'id_client' => 'required|integer',
            'id_product' => 'required|integer',
            'date_of_shipment' => 'required|date_format:Y-m-d H:i:s',
            'price_per_unit' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,4})?$/'],
            'total_amount' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,4})?$/'],
            'quantity' => 'required|integer',
        ];
    }
}
