<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{

    protected $defaults = array(
        'razon_pendiente_id' => 1 //valor por defecto
    );

    public function __construct(array $attributes = array()) {
    $this->setRawAttributes($this->defaults, true);
    parent::__construct($attributes);
    }

    protected $fillable = [

        'producto_id',
        'articulo_id',
        'razon_pendiente_id',
        'tipo_servicio_id',
        'modo_servicio_id',
        'customer_id',
        'cliente_id',
        'fecha_inicio', 
        'fecha_reparado', 
        'fecha_finalizado', 
        'mano_obra',
        'valor_asegurado_producto', 
        'happy_call_estado',
        'happy_call_calificacion',
        'valor_cotizado',
        'valor_total',
        'reporte_tecnico',
        'ubicacion_producto',

    ];
    function productos ()
    {
        return $this-> hasMany(Producto::Class);
    }

    function cliente()
    {
        return $this-> belongsTo(Cliente::Class,'cliente_id','identificacion' );
    }

    function customer()
    {
        return $this-> belongsTo(User::Class,'customer_id','identificacion');
    }

    function articulos ()
    {
        return $this-> hasMany(Articulo::Class);
    }

    function razonPendiente ()
    {
        return $this-> belongsTo(ReazonPendiente::Class);
    }

    function modoServicio ()
    {
        return $this-> belongsTo(ModoServicio::Class);
    }

    function tipoServicio ()
    {
        return $this-> belongsTo(TipooServicio::Class);
    }

}

