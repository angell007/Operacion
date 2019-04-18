<?php

use Illuminate\Database\Seeder;

class FacturaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Factura::Class, 50)->create();
    }
}
