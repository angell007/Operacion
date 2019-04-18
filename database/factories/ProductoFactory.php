<?php

use Faker\Generator as Faker;

$factory->define(App\Producto::class, function (Faker $faker) {
    return [
       
        'factura_id'=> $faker->numberBetween($min = 1000, $max = 9000), // 8567
        'proveedor_id'=> $faker->numberBetween($min = 1, $max = 30), // 8567
        'referencia'=> $faker->numberBetween($min = 1000, $max = 9000), // 8567
        'descripcion'=>$faker->text(100),
        'costo_entrada' => $faker->numberBetween($min = 1000, $max = 9000), // 8567
        'cantidad' => rand(1,30)
    ];
});