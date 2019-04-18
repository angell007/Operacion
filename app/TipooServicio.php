<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipooServicio extends Model
{
    function servicios ()
    {
        return $this-> hasMany(Servicio::Class);
    }}
