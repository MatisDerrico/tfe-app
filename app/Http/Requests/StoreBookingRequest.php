<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookingRequest extends FormRequest
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
            'name'=> 'required',
            'price'=> 'required|integer|numeric',
            'hour'=> 'required',
            'minute'=> 'required',
            'date' => 'required',
            'email' => 'required',
            'servicesChoosen' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Veuillez saisir votre nom',
            'email.required' => 'Veuillez saisir une adresse mail',
            'hour.required' => 'Veuillez préciser une heure',
            'minute.required' => 'Veuillez préciser les minutes',
            'date.required' => 'Veuillez préciser le jour',
            'servicesChoosen.required' => "Veuillez choisir un service minimum"
        ];
    }
}
