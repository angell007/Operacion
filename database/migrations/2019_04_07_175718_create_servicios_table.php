<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicios', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('producto_id')->nullable();
            $table->unsignedInteger('articulo_id')->nullable();
            $table->unsignedInteger('razon_pendiente_id')->nullable();
            $table->unsignedInteger('tipo_servicio_id');
            $table->unsignedInteger('modo_servicio_id');
            $table->unsignedInteger('customer_id');
            $table->unsignedInteger('cliente_id');
            $table->date('fecha_inicio');
            $table->date('fecha_reparado')->nullable();
            $table->date('fecha_finalizado')->nullable();
            $table->string('mano_obra')->nullable();
            $table->string('valor_asegurado_producto')->nullable();
            $table->string('happy_call_estado')->nullable();
            $table->string('happy_call_calificacion')->nullable();
            $table->string('valor_cotizado')->nullable();
            $table->string('valor_total')->nullable();
            $table->string('reporte_tecnico')->nullable();
            $table->string('ubicacion_producto')->nullable();
            $table->timestamps();
            
            $table->foreign('customer_id')->references('identificacion')->on('users')->
            onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('servicios');
    }
}
