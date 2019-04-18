<?php

use Illuminate\Database\Seeder;

class ArticuloTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Articulo::Class, 50)->create();
    }
}
