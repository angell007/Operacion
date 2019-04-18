<?php

use Illuminate\Database\Seeder;

class ModoServicioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\ModoServicio::Class, 50)->create();
    }
}
