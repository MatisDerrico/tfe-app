<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreServiceRequest extends FormRequest
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
            'name'=> 'required|min:6',
            'price'=> 'required|integer|numeric',
            'description'=> 'required',
            'duration'=> 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'=> 'Veuillez saisir un nom de service',
            'name.min'=> 'Veuillez saisir un nom de 6 caractères minimum',
            'price.required'=> 'Veuillez saisir un prix',
        ];
    }
}
