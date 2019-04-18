<?php

use Illuminate\Database\Seeder;

class RazonPendienteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\ReazonPendiente::Class, 50)->create();
    }
}
