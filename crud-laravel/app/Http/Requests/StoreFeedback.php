<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFeedback extends FormRequest
{
    /**
     * Determine se o usuário está autorizado a fazer esta solicitação.
     */
    public function authorize(): bool
    {
        return true; // Permite que todos os usuários façam esta solicitação
    }

    /**
     * Regras de validação aplicadas à solicitação.
     */
    public function rules(): array
    {
        return [
            'avaliacao' => 'required|integer|between:1,5', // A avaliação deve ser entre 1 e 5
            'mensagem' => 'required|string', // A mensagem deve ser obrigatória e do tipo string
            'sugestoes' => 'nullable|string', // Sugestões são opcionais, mas se fornecidas, devem ser do tipo string
        ];
    }

    /**
     * Mensagens personalizadas de erro.
     */
    public function messages()
    {
        return [
            'avaliacao.required' => 'A avaliação é obrigatória.',
            'avaliacao.integer' => 'A avaliação deve ser um número inteiro.',
            'avaliacao.between' => 'A avaliação deve ser entre 1 e 5.',
            'mensagem.required' => 'A mensagem é obrigatória.',
            'mensagem.string' => 'A mensagem deve ser um texto.',
            'sugestoes.string' => 'As sugestões devem ser um texto válido.',
        ];
    }
}
