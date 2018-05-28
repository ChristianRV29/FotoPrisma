<?php

namespace FotoPrisma\Http\Requests;

use FotoPrisma\Http\Requests\Request;

class UsuarioFormRequest extends Request
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
                         
            'Tipo_Documento'=>'required|max:45',           
            'Documento'=>'required|min:8|numeric',            
            'Nombre'=>'required|max:60',                        
            'Ciudad'=>'required|max:45',
            'Telefono'=>'required|min:10|numeric', 
            'Correo'=>'required|max:45',
            'Clave'=>'required|min:8'                       

        ];
    }
}

