<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DatosRoleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->checkAdmin();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'key' => 'required|unique:roles,key,' . $this->route('role')['id'] . '|between:4,15|alpha|regex:/^[A-Z]{1}[a-z]+/',
            'funcion' => 'required|min:8',
            'descripcion' => 'nullable',
        ];
    }

    /**
     * Personaliza los mensajes del campo 'key'
     *
     * @return array
     */
    public function messages()
    {
        return [
            'key.regex' => 'El campo key debe ser una palabra del tipo Capital.',
        ];
    }
}
