<?php

namespace FotoPrisma;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{

	protected $table='Rol';

	protected $primaryKey='idRol';

	public $timestamps=false;

	protected $fillable =[
     
    	'Nombre'
    ];

    protected $guarded =[

    	
    ];
}
