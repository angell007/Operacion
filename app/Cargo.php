<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    protected $fillable = [
        'nombre',
        'descripcion'
    ];
    function usuarios ()
    {
        return $this-> hasMany(User::Class)->withPivot('user_id');
        ;
    }
}
