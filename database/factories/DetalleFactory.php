<?php

use Faker\Generator as Faker;

$factory->define(App\Detalle::class, function (Faker $faker) {
    return [
        'producto_id'=> $faker->numberBetween($min = 1, $max = 50), // 8567
        'factura_id'=> $faker->numberBetween($min = 1, $max = 50), // 8567
        'cantidad' => rand(1,30),
        'precio'=> $faker->numberBetween($min = 1, $max = 50), // 8567
    ];
});
