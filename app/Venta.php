<?php

namespace mistshop;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    //Tabla y id de la tabla.
    protected $table = 'venta';
    protected $primaryKey = 'idventa';


    //Columnas de creacion y actualización.
    public $timestamps = false;

    //Campos rellenables.
    protected $fillable = [
        'idcliente',
        'tipo_comprobante',
        'serie_comprobante',
        'num_comprobante',
        'fecha_hora',
        'impuesto',
        'total_venta',
        'estado'
    ];

    //Campos protegidos
    protected $guarded = [

    ];
}
