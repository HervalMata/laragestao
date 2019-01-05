<?php

namespace GestaoTrocasUser\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserSettingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'password' => 'required|min:6|max:16|confirmed',
        ];
    }

    public function messages()
    {
        return  [
            'required' => 'O :attribute é requerido',
            'max' => 'O :attribute não pode ter mais que :max caracteres.',
            'min' => 'O :attribute tem que ter pelo menos :min caracteres.',
            'confirmed' => 'O :attribute tem que ter exatamente igual a senha.',
        ];
    }

    public function attributes()
    {
        return [
            'password' => 'Senha',
            'password_confirmed' => 'Confirmação da senha',
        ];

    }
}
