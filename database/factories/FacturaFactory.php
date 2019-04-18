<?php

use Faker\Generator as Faker;

$factory->define(App\Factura::class, function (Faker $faker) {
    return [
        'vendedor_id' => $faker->numberBetween($min = 1, $max = 50),
        'cliente_id' => $faker->numberBetween($min = 1, $max = 50),
        'fecha'=>$faker->dateTime($max = 'now', $timezone = null), // DateTime('2008-04-25 08:37:17', 'UTC')
    ];
});
