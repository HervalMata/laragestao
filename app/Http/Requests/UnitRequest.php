<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UnitRequest extends FormRequest
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
        $id = $this->route('unit');
        return [
            'name' => "required|min:3|max:20|unique:units,name,$id",
            'sector' => 'required|min:3|max:20',
            'state' => 'required|size:2',
            'city' => 'required|min:3|max:20',
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
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Nome',
            'sector' => 'Setor',
            'state' => 'Estado',
            'city' => 'Cidade',
        ];
    }
}
