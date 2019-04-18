<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    function proveedor ()
    {
        return $this-> belongsTo(Proveedor::Class);
    }

    // function servicio ()
    // {
    //     return $this-> belongsTo(Proveedor::Class);
    // }
}
