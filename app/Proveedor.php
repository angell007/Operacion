<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    function productos ()
    {
        return $this-> hasMany(Producto::Class);
    }}
