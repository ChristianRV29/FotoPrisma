<?php

namespace FotoPrisma;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table='Producto';

    protected $primaryKey='idProducto';

    public $timestamps=false;

    protected $fillable =[
     
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
