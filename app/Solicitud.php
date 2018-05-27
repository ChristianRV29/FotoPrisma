<?php

namespace FotoPrisma;

use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    protected $table='Solicitud';

    protected $primaryKey='idSolicitud';

    public $timestamps=false;


	protected $fillable =[
         	
    	'idUsuario',        
    	'Fecha_Solicitud', 
        'Fecha_Efectiva',
    	'Impuesto',        
    	'Total',
    	'Estado'
    ];

    protected $guarded =[

    
    ];

}
