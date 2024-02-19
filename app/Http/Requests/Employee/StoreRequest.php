<?php

namespace App\Http\Requests\Employee;

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
            'lastname' => 'required|string',
            'firstname' => 'required|string',
            'patronymic' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|integer',
            'salary' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2,3,4})?$/'],
            'date_of_birthday' => 'required|date_format:Y-m-d',
            'position' => 'required|string',
            'status' => 'required|boolean',
        ];
    }
}
