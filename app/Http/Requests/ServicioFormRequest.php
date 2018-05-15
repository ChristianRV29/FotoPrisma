<?php

namespace FotoPrisma\Http\Requests;

use FotoPrisma\Http\Requests\Request;

class ServicioFormRequest extends Request
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
            
            'idCategoria'=>'required',
            'Nombre'=>'required|max:45',
            'Descripcion'=>'required|max:100',
            'Precio'=>'required|numeric',
            'Imagen'=>'mimes:jpeg,bmp,png', 
            'Existencias'=>'numeric|max:999',                
        ];
    }
}
