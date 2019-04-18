<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModoServicio extends Model
{
    function servicios ()
    {
        return $this-> hasMany(Servicio::Class);
    }
}
