<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSalaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nome' => 'required|string|max:255',
            'capacidade' => 'required|integer|min:1',
            'localizacao' => 'required|string|max:255'
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required' => 'O nome é obrigatório',
            'capacidade.required' => 'A capacidade é obrigatória',
            'capacidade.integer' => 'A capacidade deve ser um número inteiro',
            'capacidade.min' => 'A capacidade deve ser no mínimo 1',
            'localizacao.required' => 'A localização é obrigatória'
        ];
    }
}