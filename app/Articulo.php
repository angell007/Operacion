<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    protected $fillable = [
        'cliente_id',
        'servicio_id',
        'serie_automatica',
        'marca',
        'modelo',
        'serie',
        'imei1',
        'ime2',
        'almacen_compra',
        'numero_factura_compra',
        'numero_vertificado_garantia',
    ];

   function cliente ()
   {
       return $this-> belongsTo(Proveedor::Class);
   }
}
