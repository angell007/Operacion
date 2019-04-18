<?php

use Illuminate\Database\Seeder;

class TipooServicioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\TipooServicio::Class, 50)->create();
    }
}
