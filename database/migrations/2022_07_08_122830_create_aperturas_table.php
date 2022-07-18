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
        Schema::create('aperturas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cajas_id');
            $table->unsignedBigInteger('users_id');
            $table->dateTime('apertura')->useCurrent();
            $table->dateTime('cierre')->nullable();
            $table->bigInteger('monto_apertura');
            $table->bigInteger('monto_cierre')->nullable();
            $table->timestamps();

            $table->foreign('cajas_id')->references('id')->on('cajas');
            $table->foreign('users_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aperturas');
    }
};
