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
        Schema::create('productos_transferencias', function (Blueprint $table) {
            //$table->id();
            $table->primary(['transferencias_id', 'productos_id']);
            $table->unsignedBigInteger('transferencias_id');
            $table->unsignedBigInteger('productos_id');
            $table->unsignedBigInteger('depositos_id');
            $table->integer('cantidad');
            $table->timestamps();

            $table->foreign('transferencias_id')->references('id')->on('transferencias');
            $table->foreign('productos_id')->references('id')->on('productos');
            $table->foreign('depositos_id')->references('id')->on('depositos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos_transferencias');
    }
};
