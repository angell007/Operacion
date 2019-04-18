<?php

use Faker\Generator as Faker;

$factory->define(App\Articulo::class, function (Faker $faker) {
    return [
        'cliente_id'=> rand(1,30),
        'servicio_id'=> rand(1,30),
        'serie_automatica'=> $faker-> text(10),
        'marca'=>$faker->company,
        'modelo'=>$faker->company,
        'serie'=>$faker->company,
        'imei1'=>$faker->text(10),
        'ime2'=>$faker->text(10),
        'almacen_compra'=>$faker->company,
        'numero_factura_compra'=>$faker->text(10),
        'numero_vertificado_garantia'=>$faker->text(10),
    ];
});

