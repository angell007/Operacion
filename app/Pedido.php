<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    function productos ()
    {
        return $this-> hasMany(Producto::Class);
    }}
