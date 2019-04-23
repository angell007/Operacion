<?php

use Faker\Generator as Faker;

$factory->define(App\Articulo::class, function (Faker $faker) {
    return [
        'cliente_id'=> rand(1,50),
        'servicio_id'=> rand(1,50),
        'serie_automatica'=> rand(10000,3000000),
        'marca'=>$faker->company,
        'modelo'=>$faker->company,
        'serie'=>rand(10000,3000000),
        'imei1'=>rand(10000,3000000),
        'ime2'=>rand(10000,3000000),
        'almacen_compra'=>$faker->company,
        'numero_factura_compra'=>rand(10000,3000000),
        'numero_vertificado_garantia'=>$faker->text(10),
    ];
});

