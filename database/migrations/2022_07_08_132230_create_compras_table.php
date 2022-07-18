<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('personas_id');
            $table->unsignedBigInteger('aperturas_id');
            $table->dateTime('fecha_hora')->useCurrent();
            $table->integer('numero_factura');
            $table->timestamps();

            $table->foreign('personas_id')->references('id')->on('personas');
            $table->foreign('aperturas_id')->references('id')->on('aperturas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('compras');
    }
};
