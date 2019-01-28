<?php

namespace mistshop;

use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{
    //Tabla y id de la tabla.
    protected $table = 'ingreso';
    protected $primaryKey = 'idingreso';


    //Columnas de creacion y actualización.
    public $timestamps = false;

    //Campos rellenables.
    protected $fillable = [
        'idproveedor',
        'tipo_comprobante',
        'serie_comprobante',
        'num_comprobante',
        'fecha_hora',
        'impuesto',
        'estado'
    ];

    //Campos protegidos
    protected $guarded = [

    ];
}
