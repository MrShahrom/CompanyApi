<?php

namespace App\Http\Requests\Cost;

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
            'id_product' => 'required|integer',
            'description' => 'required|string',
            'date' => 'required|date_format:Y-m-d H:i:s',
            'amount' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,4})?$/']
        ];
    }
}
