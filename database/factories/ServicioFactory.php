<?php

use Faker\Generator as Faker;

$factory->define(App\Servicio::class, function (Faker $faker) {
    return [
        'producto_id' => rand(1,50),
        'articulo_id' => rand(1,50),
        'razon_pendiente_id' => rand(1,20),
        'tipo_servicio_id' => rand(1,20),
        'modo_servicio_id'=>rand(1,20),
        'customer_id'=>rand(1000000 , 30000000),
        'cliente_id'=>rand(1,20),
        'fecha_inicio'=>$faker->dateTime($max = 'now', $timezone = null), // DateTime('2008-04-25 08:37:17', 'UTC')
        'fecha_reparado'=>$faker->dateTime($max = 'now', $timezone = null), // DateTime('2008-04-25 08:37:17', 'UTC')
        'fecha_finalizado'=>$faker->dateTime($max = 'now', $timezone = null), // DateTime('2008-04-25 08:37:17', 'UTC')
        'mano_obra'=>$faker->text(100),
        'valor_asegurado_producto'=>$faker->numberBetween($min = 1000, $max = 9000), // 8567,
        'happy_call_estado'=>$faker->text(100),
        'happy_call_calificacion'=>$faker->text(100),
        'valor_cotizado'=>$faker->numberBetween($min = 1000, $max = 9000), // 8567,
        'valor_total'=>$faker->numberBetween($min = 1000, $max = 9000), // 8567,
        'reporte_tecnico'=>$faker->text(100),
        'ubicacion_producto'=>$faker->text(100),
    ];
});


