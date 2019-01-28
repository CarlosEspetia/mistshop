<?php

namespace mistshop;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    //Tabla y id de la tabla.
    protected $table = 'persona';
    protected $primaryKey = 'idpersona';


    //Columnas de creacion y actualización.
    public $timestamps = false;

    //Campos rellenables.
    protected $fillable = [
        'tipo_persona',
        'nombre',
        'tipo_documento',
        'num_documento',
        'direccion',
        'telefono',
        'email'
    ];

    //Campos protegidos
    protected $guarded = [

    ];
}
