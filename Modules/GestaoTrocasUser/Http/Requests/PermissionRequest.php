<?php

namespace GestaoTrocasUser\Http\Requests;

use GestaoTrocasUser\Repositories\RoleRepository;
use Illuminate\Foundation\Http\FormRequest;

class PermissionRequest extends FormRequest
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
        $id = $this->route('role');
        $method = mb_strtoupper($this->getMethod());

        if (in_array($method, ['POST', 'PUT'])) {
            return [
                'name' => "required|max:255|unique:roles,name,$id",
                'description' => 'max:255'
            ];
        }
        return [
            //'permissions' => 'required|array',
            'permissions.*' => 'exists:permissions,id'
        ];
    }

}
