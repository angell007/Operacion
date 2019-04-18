<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModoServicio extends Model
{
    protected $fillable = [
        'nombre',
        'descripcion'
    ];
    
    function servicios ()
    {
        return $this-> hasMany(Servicio::Class);
    }
}
