<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $fillable = [
        'nombre',
        'descripcion'
    ];
    
    function productos ()
    {
        return $this-> hasMany(Producto::Class);
    }}
