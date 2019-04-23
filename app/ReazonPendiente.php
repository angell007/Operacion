<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReazonPendiente extends Model
{
    // protected $defaults = array(
    //     'nombre' => "Iniciado", 
    //     'descripcion' => " " 

    // );

    // public function __construct(array $attributes = array()) {
    // $this->setRawAttributes($this->defaults, true);
    // parent::__construct($attributes);
    // }

    protected $fillable = [
        'nombre',
        'descripcion'
    ];
    
    function servicios ()
    {
        return $this-> hasMany(Servicio::Class);
    }
}
