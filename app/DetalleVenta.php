<?php

namespace mistshop;

use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    //Tabla y id de la tabla.
    protected $table = 'detalle_venta';
    protected $primaryKey = 'iddetalle_venta';


    //Columnas de creacion y actualización.
    public $timestamps = false;

    //Campos rellenables.
    protected $fillable = [
        'idventa',
        'idarticulo',
        'cantidad',
        'precio_venta',
        'descuento'
    ];

    //Campos protegidos
    protected $guarded = [

    ];
}
