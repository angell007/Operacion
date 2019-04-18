<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReazonPendiente extends Model
{
    function servicios ()
    {
        return $this-> hasMany(Servicio::Class);
    }
}
