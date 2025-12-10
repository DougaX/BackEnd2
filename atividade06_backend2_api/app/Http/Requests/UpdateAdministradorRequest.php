<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAdministradorRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // CERTIFIQUE-SE QUE ESTÁ TRUE!
    }

    public function rules(): array
    {
        return [
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:administradores,email,' . $this->route('id'),
            'senha' => 'nullable|string|min:6'
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required' => 'O nome é obrigatório',
            'email.required' => 'O email é obrigatório',
            'email.email' => 'O email deve ser válido',
            'email.unique' => 'Este email já está cadastrado',
            'senha.min' => 'A senha deve ter no mínimo 6 caracteres'
        ];
    }
}