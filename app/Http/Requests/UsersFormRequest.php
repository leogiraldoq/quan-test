<?php

namespace App\Http\Requests;

use App\Rules\PersonalUserDataRule;
use Illuminate\Foundation\Http\FormRequest;

class UsersFormRequest extends FormRequest
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
        return match($this->method()){
            'POST' => $this->createUserValidation(),
            'PUT' , 'PATCH' => $this->updateUserValidation(),
            'DELETE' => $this->deleteUserValidation(),
            default => $this->view()
        };
    }

    
    public function view()
    {
        return [
            //
        ];
    }

    public function createUserValidation(): array{
        return [
            'name' => 'required|max:255',
            'email' => 'email|unique:users,email',
            'password' => 'required',
            'personal_reference' => ['required','array','min:1','max:3',new PersonalUserDataRule],
            'blood_type' => 'required|string|min:2|max:3',
            'phone_number' => 'required|string|min:10|max:10',
            'address' => 'required|string',
            'birth' => 'required|date',
            'role' => 'required|array|min:1',
            'role.*' => 'numeric'
        ];
    }

    public function updateUserValidation(): array
    {
        return [
            'id' => 'required|integer|exists:users,id',
            'name' => 'required|max:255',
            'email' => 'email',
            'password' => 'required',
            'personal_reference' => ['required','array','min:1','max:3',new PersonalUserDataRule],
            'blood_type' => 'required|string|min:2|max:3',
            'phone_number' => 'required|string|min:10|max:10',
            'address' => 'required|string',
            'birth' => 'required|date',
            'role' => 'required|array|min:1',
            'role.*' => 'numeric'
        ];
    }

    public function deleteUserValidation(): array
    {
        return [
            'id' => 'required|integer|exists:users,id'
        ];
    }

    public function messages(): array
    {
        return [
            'id.required' => 'El id del usuario es requerido',
            'id.integer' => 'El id del usuario debe ser un número',
            'id.exists' => 'El id del usuario es invalido y no existe en la base de datos',
            'name.required' => 'El nombre es requerido',
            'name.max' => 'El nombre no puede contener mas de 255 caracteres',
            'email.email' => 'La dirección de correo electrónico es invalida',
            'email.unique' => 'La dirección de correo electrónico ya esta registrada',
            'password.required' => 'La contraseña es obligatoria',
            'personal_reference.required' => 'No existen referencias personales para el usuario',
            'personal_reference.max' => 'Recuerde que son 3 referencias personales por usuario',
            'personal_reference.PersonalUserDataRule' => 'Hace falta información de las referencias personales',
            'blood_type' => 'El tipo de sangre es requerido',
            'phone_number' => 'El número de teléfono es requerido',
            'address' => 'La dirección de residencia es requerida',
            'birth.required' => 'La fecha de nacimiento es requerida',
            'birth.date' => 'La fecha debe ser de tipo date',
            'role.required' => 'El usuario debe tener por lo menos un rol asignado',
            'role.array' => 'El formato en el que se envia los roles es incorrecto',
            'role.*.numeric' => 'Los roles debn ser enviado en formato numerico'
        ];
    }
}
