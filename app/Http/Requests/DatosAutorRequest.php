<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DatosAutorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
        //return $this->user()->checkBiblio();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $vida = '';
        $edad_genio = 5;
        $edad_matusalem = 150;
        $nacido = '|max:' . (date('Y') - $edad_genio);
        if (!is_null($this->nacio) && !is_null($this->murio)) {
            $vida = '|between:' . ($this->nacio + $edad_genio) . ',' . min($this->nacio + $edad_matusalem, date('Y'));
        }

        return [
            //
            'nombre' => 'required|min:2',
            'apellidos' => '',
            'nacio' => 'nullable|integer' . $nacido,
            'murio' => 'nullable|integer' . $vida,
        ];
    }
}
