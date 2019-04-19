<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'cargo_id','identificacion'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];

    function cargo ()
    {
        return $this-> hasMany(Cargo::Class)->withPivot('cargo_id');
        
    }

    function facturas ()
    {
        return $this-> hasMany(Factura::Class);
    }

    function Servicios ()
    {
        return $this-> hasMany(Servicio::Class,  'identificacion' , 'customer_id' );
    }


    public function hasRoles(array $rols)
    {
    foreach ($rols as $key ) {
    if ($this->role===$key) {
        return true;     
    }
    return false;  
    }
    }
    
}
