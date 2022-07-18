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
        Schema::create('cajas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sucursales_id');
            $table->unsignedBigInteger('timbrados_id');
            $table->string('expedicion_fiscal');
            $table->string('nombre')->unique();
            $table->boolean('abierto')->default('false');
            $table->bigInteger('monto_actual')->default(0);
            $table->boolean('activo')->default('true');
            $table->timestamps();

            $table->foreign('sucursales_id')->references('id')->on('sucursales');
            $table->foreign('timbrados_id')->references('id')->on('timbrados');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cajas');
    }
};
