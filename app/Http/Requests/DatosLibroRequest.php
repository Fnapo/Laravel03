<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DatosLibroRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->checkBiblio();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // $campo = ($this->missing('disponibles') ? '' : 'disponibles');
        // $condicion = ($this->missing('disponibles') ? '' : 'required|integer|between:0,' . $this->obtenidos);

        return [
            //
            'autores' => 'required',
            'titulo' => 'required',
            'obtenidos' => 'required|integer|min:1',
            'disponibles' => 'sometimes|required|integer|between:0,' . $this->obtenidos,
        ];
    }
}
