<?php

namespace Apwcos_eia\Http\Requests;

use Apwcos_eia\Http\Requests\Request;

class ClienteFormRequest extends Request
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
            'nombre'=>'required|max:70',
            'apellidos'=>'required|max:100',
            'edad'=>'required |numeric',
            'fechanac'=>'required |date',
            'telefono'=>'required | numeric',
            'correo'=> 'required|email|max:255',
            'direccion'=>'required|max:255'
            
        ];
    }
}
