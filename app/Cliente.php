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
        return $this-> hasMAny(Servicio::Class,'cliente_id','identificacion');
    }

    function facturas ()
    {
        return $this-> hasMany(Factura::Class);
    }

    public function scopeNombre($query, $nombre){
        return $query->where('nombre','like','%'.$nombre.'%');
    }

    public function scopeApellido($query, $apellido){
        return $query->where('apellido','like','%'.$apellido.'%');
    }

    public function scopeIdentificacion($query, $identificacion){
        return $query->where('identificacion','like','%'.$identificacion.'%');

    }
}
