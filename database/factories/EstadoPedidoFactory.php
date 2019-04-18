<?php

use Faker\Generator as Faker;

$factory->define(App\EstadoPedido::class, function (Faker $faker) {
    return [
       
        'nombre' => $faker->randomElement(['Iniciado','En Envio','Entregado']),
        'descripcion' => $faker->text(100),
    ];
});
