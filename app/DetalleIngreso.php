<?php

namespace mistshop;

use Illuminate\Database\Eloquent\Model;

class DetalleIngreso extends Model
{
    //Tabla y id de la tabla.
    protected $table = 'detalle_ingreso';
    protected $primaryKey = 'iddetalle_ingreso';


    //Columnas de creacion y actualización.
    public $timestamps = false;

    //Campos rellenables.
    protected $fillable = [
        'idingreso',
        'idarticulo',
        'cantidad',
        'precio_compra',
        'precio_venta'
    ];

    //Campos protegidos
    protected $guarded = [

    ];
}
