<?php

namespace FotoPrisma;

use Illuminate\Database\Eloquent\Model;

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
        'Telefono',     
        'Estado'       
    ];

    protected $guarded =[

    
    ];
}
