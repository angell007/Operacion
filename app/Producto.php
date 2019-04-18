<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = [
        'factura_id',
        'proveedor_id',
        'referencia',
        'descripcion',
        'costo_entrada',
        'cantidad'

    ];
    function proveedor ()
    {
        return $this-> belongsTo(Proveedor::Class);
    }

    // function servicio ()
    // {
    //     return $this-> belongsTo(Proveedor::Class);
    // }
}
