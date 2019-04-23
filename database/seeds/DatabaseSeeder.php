<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UsersTableSeeder::class);
         $this->call(ArticuloTableSeeder::class);
         $this->call(CargoTableSeeder::class);
         $this->call(ClienteTableSeeder::class);
         $this->call(DetalleTableSeeder::class);
         $this->call(EstadoPedidoTableSeeder::class);
         $this->call(FacturaTableSeeder::class);
         $this->call(ModoServicioTableSeeder::class);
         $this->call(PedidoTableSeeder::class);
         $this->call(ProductoTableSeeder::class);
         $this->call(ProveedorTableSeeder::class);
        //  $this->call(RazonPendienteTableSeeder::class);
        //  $this->call(ServicioTableSeeder::class);
         $this->call(TipooServicioTableSeeder::class);



    }
}
