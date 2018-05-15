<?php

namespace FotoPrisma;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $table='Servicio';

    protected $primaryKey='idServicio';

    public $timestamps=false;


	protected $fillable =[
     
    	'idCategoria',
    	'Nombre',
    	'Descripcion',
    	'Precio',
    	'Imagen',
    	'Existencias',
    	'Estado'
    ];

    protected $guarded =[

    
    ];
}
