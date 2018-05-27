<?php

namespace FotoPrisma\Http\Requests;

use FotoPrisma\Http\Requests\Request;

class SolicitudFormRequest extends Request
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
            
            'idUsuario'=>'required',
            'idServicio'=>'required',
            'Fecha_Efectiva'=>'required',            
            'Cantidad'=>'required',
            'Total'=>'required'
        ];
    }
}
