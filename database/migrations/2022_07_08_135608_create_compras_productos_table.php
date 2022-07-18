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
        Schema::create('compras_productos', function (Blueprint $table) {
            //$table->id();
            $table->primary(['productos_id', 'compras_id']);
            $table->unsignedBigInteger('productos_id');
            $table->unsignedBigInteger('compras_id');
            $table->unsignedBigInteger('depositos_id');
            $table->unsignedBigInteger('ivas_id');
            $table->integer('cantidad');
            $table->integer('precio');
            $table->timestamps();

            $table->foreign('productos_id')->references('id')->on('productos');
            $table->foreign('compras_id')->references('id')->on('compras');
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
        Schema::dropIfExists('compras_productos');
    }
};
