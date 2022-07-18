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
        Schema::create('productos_ventas', function (Blueprint $table) {
            //$table->id();
            $table->primary(['productos_id', 'ventas_id']);
            $table->unsignedBigInteger('productos_id');
            $table->unsignedBigInteger('ventas_id');
            $table->unsignedBigInteger('depositos_id');
            $table->unsignedBigInteger('ivas_id');
            $table->integer('cantidad');
            $table->integer('precio');
            $table->timestamps();

            $table->foreign('productos_id')->references('id')->on('productos');
            $table->foreign('ventas_id')->references('id')->on('ventas');
            $table->foreign('depositos_id')->references('id')->on('depositos');
            $table->foreign('ivas_id')->references('id')->on('ivas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos_ventas');
    }
};
