<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    function usuarios ()
    {
        return $this-> hasMany(User::Class)->withPivot('user_id');
        ;
    }
}
