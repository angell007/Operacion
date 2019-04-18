<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstadoPedido extends Model
{
    function servicio ()
    {
        return $this-> hasMany(Servicio::Class);
    }
}
