<?php

namespace mistshop;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    //Tabla y id de la tabla.
    protected $table = 'categoria';
    protected $primaryKey = 'idcategoria';


    //Columnas de creacion y actualización.
    public $timestamps = false;

    //Campos rellenables.
    protected $fillable = [
        'nombre',
        'descripcion',
        'condicion'
    ];

    //Campos protegidos 
    protected $guarded = [

    ];
}
