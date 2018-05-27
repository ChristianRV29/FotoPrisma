<?php

namespace FotoPrisma;

use Illuminate\Database\Eloquent\Model;

class Detalle extends Model
{

	 protected $table='Detalle';

    protected $primaryKey='idDetalle';

    public $timestamps=false;


	protected $fillable =[
         
     	'idSolicitud',
     	'idServicio',
     	'Cantidad'


    	
    ];

    protected $guarded =[

    
    ];
}
