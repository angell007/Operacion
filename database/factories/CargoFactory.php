<?php

use Faker\Generator as Faker;

$factory->define(App\Cargo::class, function (Faker $faker) {
    return [
        
        'nombre' => $faker->realText(rand(10,20)),
        'descripcion' => $faker->text(100),
    ];
});
