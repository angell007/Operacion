<?php

use Faker\Generator as Faker;

$factory->define(App\Cliente::class, function (Faker $faker) {
    return [
        'nombre' => $faker->name,
        'apellido' => $faker->lastname,
        'sexo'=>$faker->randomElement(['H','M','O']),
        'email' => $faker->unique()->safeEmail,
        'identificacion'=>$faker->unique()->numberBetween($min = 1000, $max = 9000),
        'tipo_identificacion'=>$faker->randomElement(['cc','passport']),
        'ciudad'=>$faker->city,
        'departamento'=>$faker->state,
        'direccion'=>$faker->address,
        'tipo_casa'=>$faker->randomElement([1, 3, 5]),
        'barrio'=>$faker->streetName,
        'telefono'=>$faker->phoneNumber,
        'opcional_telefono'=>$faker->phoneNumber,

    ];
});


