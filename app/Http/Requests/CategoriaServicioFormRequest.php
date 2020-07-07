<?php

namespace Apwcos_eia\Http\Requests;

use Apwcos_eia\Http\Requests\Request;

class CategoriaServicioFormRequest extends Request
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
            't_servicio'=>'required|max:50',
            'descripcion'=>'max:256'
        ];
    }
}
