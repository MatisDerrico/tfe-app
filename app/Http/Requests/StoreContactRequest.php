<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest
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
            'prenom'=> 'required',
            'nom'=> 'required',
            'email'=> 'required',
            'phone'=> 'required',
            'message'=> 'required',
        ];
    }

    public function messages()
    {
        return [
            'prenom.required'=> 'Veuillez saisir un prénom',
            'nom.min'=> 'Veuillez saisir un nom',
            'email.required'=> 'Veuillez saisir une adresse mail correcte',
            'phone.required'=> 'Veuillez saisir un numéro de téléphone correct',
            'message.required'=> 'Veuillez saisir votre message',
        ];
    }
}
