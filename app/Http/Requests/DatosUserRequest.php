<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DatosUserRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'email|required|unique:users,email,' . $this->route('usuario'),
            'password' => 'required|min:4',
            'role_id' => 'required',
        ];
    }
}
