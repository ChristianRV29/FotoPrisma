<?php

namespace FotoPrisma;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Usuario extends Model
{
    
    protected $table='Usuario';

    protected $primaryKey='Documento';

    public $timestamps=false;


	protected $fillable =[
     
    	'idRol',
        'Tipo_Documento',      
        'Documento',
    	'Nombre',    	    	
    	'Ciudad',
    	'Correo',
        'Clave',   
        'Telefono',     
        'Estado',
        'user_id'
    ];

    protected $guarded =[

    
    ];

    public function userAuth() {
        return $this->belongsTo('FotoPrisma\User', 'user_id');
    }

}
