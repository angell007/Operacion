<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstadoPedido extends Model
{
    protected $fillable = [
        'nombre',
        'descripcion'
    ];
    
    function servicio ()
    {
        return $this-> hasMany(Servicio::Class);
    }
}
