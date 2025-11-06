<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SalidaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'phoneNumber_supplier' => 'required|string|max:10',
            'phone' => 'required|string|max:10',
        ];
    }
    public function messages()
    {
        return [
            'phoneNumber_supplier.required' => 'El número de teléfono es obligatorio',
            'phoneNumber_supplier.max' => 'El número de teléfono no puede tener más de 10 caracteres',
            'phone.max' => 'El número de teléfono no puede tener más de 10 caracteres',
            'phone.required' => 'El número de teléfono es obligatorio',
        ];
    }
}
