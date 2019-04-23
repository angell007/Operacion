<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        'nombre', 
        'apellido',
        'sexo', 
        'email', 
        'tipo_identificacion', 
        'identificacion',
        'tipo_casa',
        'ciudad',
        'barrio',
        'direccion',
        'telefono',
        'telefono_opcional',
        'departamento'
    ];
    protected $hidden = [
        'password', 'remember_token'
    ];

    function servicios()
    {
        return $this-> hasMAny(Servicio::Class);
    }

    function facturas ()
    {
        return $this-> hasMany(Factura::Class);
    }
}
