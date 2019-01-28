<?php

namespace mistshop;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    //Tabla y id de la tabla.
    protected $table = 'articulo';
    protected $primaryKey = 'idarticulo';


    //Columnas de creacion y actualización.
    public $timestamps = false;

    //Campos rellenables.
    protected $fillable = [
        'idcategoria',
        'codigo',
        'nombre',
        'stock',
        'descripcion',
        'imagen',
        'estado'
    ];

    //Campos protegidos 
    protected $guarded = [

    ];
}
