<?php

use Illuminate\Database\Seeder;

class DetalleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Detalle::Class, 50)->create();
    }
}
