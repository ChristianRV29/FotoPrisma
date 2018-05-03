<?php

namespace FotoPrisma\Http\Requests;

use FotoPrisma\Http\Requests\Request;

class ProductoFormRequest extends Request
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
            'Nombre'=>'required|max:50',
            'Descripcion'=>'required|max:100',
            'Precio'=>'required|max:10',
            'Imagen'=>'max:50',
            'Existencias'=>'max:11',
            'Estado'=>'max:1'
        ];
    }
}
