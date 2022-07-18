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
        Schema::create('timbrados', function (Blueprint $table) {
            $table->id();
            $table->integer('numero')->unique();
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->integer('factura_inicio');
            $table->integer('factura_fin');
            $table->integer('factura_actual');
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
        Schema::dropIfExists('timbrados');
    }
};
