<?php

use Faker\Generator as Faker;

$factory->define(App\Pedido::class, function (Faker $faker) {
    return [
        'estado_pedido_id'=>rand(1,20),
        'numero_pedido_interno'=> rand(1,20),
        'numero_pedido_proveedor'=> rand(1,20000000),
        'descripcion'=>$faker->text(100),
        'costo' => $faker->randomNumber($nbDigits = NULL, $strict = false),
        'cantidad' => rand(1,30)
    ];
});

