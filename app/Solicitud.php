<?php

namespace FotoPrisma;

use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    protected $table='Solicitud';

    protected $primaryKey='idSolicitud';

    public $timestamps=false;


	protected $fillable =[
     
    	'idSolicitud',
    	'idUsuario',
    	'Fecha_Solicitud',
    	'Impuesto',
    	'Total',
    	'Estado'
    ];

    protected $guarded =[

    
    ];

}
