<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $fillable = [
        'nombre',
        'descripcion',
        'nit',
        'ciudad',
        'direccion',
        'telefono',
        'telefono_opcional'
    ];
    
    function productos ()
    {
        return $this-> hasMany(Producto::Class);
    }}
