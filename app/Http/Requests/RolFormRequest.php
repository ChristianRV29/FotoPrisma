<?php

namespace FotoPrisma\Http\Requests;

use FotoPrisma\Http\Requests\Request;

class RolFormRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            
            'Nombre'=>'required|max:45'
        ];
    }
}
