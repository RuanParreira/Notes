<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthLogin extends FormRequest
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
            //Rules
            'email' => 'required|email',
            'password' => 'required|min:6|max:16',
        ];
    }

    public function messages(): array
    {
        return [
            //Error mensagens
            // Email
            'email.required' => 'Email Obrigatório!',
            'email.email' => 'Email invalido',
            // Senha
            'password.required' => 'Senha Obrigatória!',
            'password.min' => 'Deve haver no minimo :min caracters',
            'password.max' => 'Deve haver no maximo :max caracters',
        ];
    }
}
