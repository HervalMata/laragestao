<?php

namespace GestaoTrocas\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $id = $this->route('user');
        return [
            'enrolment' => "required|min:3|max:20|unique:users,key,$id",
            'name' => 'required|min:3|max:20',
            'email' => 'required|email',
            'units' => 'required|array',
            'units.*' => 'exists:units,id',
        ];
    }

    public function messages()
    {
        return  [
            'required' => 'O :attribute é requerido',
            'unique' => 'O :attribute já está em uso',
            'max' => 'O :attribute não pode ter mais que :max caracteres.',
            'min' => 'O :attribute tem que ter pelo menos :min caracteres.',
            'size' => 'O :attribute tem que ter exatamente :size caracteres.',
            'email' => 'O :attribute é inválido.',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Nome',
            'enrolment' => 'Chave',
            'email' => 'Email',
            'unit_id' => 'Unidade',
        ];
    }
}
