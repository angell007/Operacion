<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulos', function (Blueprint $table) {
            $table->increments('id');
            // $table->unsignedInteger('cliente_id');
            $table->unsignedInteger('servicio_id')->nullable();
            $table->string('tipo')->nullable();
            $table->string('marca');
            $table->string('modelo');
            $table->string('serie')->unique();
            $table->string('imei1')->unique()->nullable();
            $table->string('ime2')->unique()->nullable();
            $table->string('almacen_compra')->nullable();
            $table->string('numero_factura_compra')->nullable();
            $table->string('numero_vertificado_garantia')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articulos');
    }
}
