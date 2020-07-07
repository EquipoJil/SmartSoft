<?php

namespace Apwcos_eia\Http\Requests;

use Apwcos_eia\Http\Requests\Request;

class EmpleadoFormRequest extends Request
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
            'idcategoria'=>'required',
            'nombre'=>'required|max:70',
            'apellidos'=>'required|max:100',
            'fechanac'=>'required |date',
            'correo'=> 'required|email|max:255',
            'telefono'=>'required | numeric',
            'direccion'=>'required|max:255',
            'genero'=>'required | max:2',
            'ciudad'=>'required | max:150',
            'srealizado'=>'required | numeric'
        ];
    }
}
