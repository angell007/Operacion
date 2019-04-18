<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    function productos ()
    {
        return $this-> hasMany(Producto::Class);
    }

    function servicios ()
    {
        return $this-> hasMany(Servicio::Class);
    }

    function cliente ()
    {
        return $this-> belongsTo(Cliente::Class);
    }

    function usuario ()
    {
        return $this-> belongsTo(Usuario::Class);
    }

    
}
