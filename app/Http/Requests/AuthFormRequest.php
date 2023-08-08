<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthFormRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email|exists:users,email',
            'password' => 'required'
        ];
    }

    public function messages():array
    {
        return [
            'email.required' => 'EL email es requerido para el inicio de sesión',
            'email.email' => 'El correo digitado es incorrecto',
            'email.exists' => 'EL usuario no existe',
            'password' => 'La contraseña es requerida'
        ];
    }
}
