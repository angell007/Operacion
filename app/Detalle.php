<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalle extends Model
{
    function productos ()
    {
        return $this-> hasMany(Producto::Class);
    }
}
