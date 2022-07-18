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
        Schema::create('perfiles_permisos', function (Blueprint $table) {
            //$table->id();
            $table->primary(['perfiles_id', 'salt']);
            $table->string('salt');
            $table->unsignedBigInteger('perfiles_id');
            $table->unsignedBigInteger('permisos_id');
            $table->timestamps();

            $table->foreign('perfiles_id')->references('id')->on('perfiles');
            $table->foreign('permisos_id')->references('id')->on('permisos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perfiles_permisos');
    }
};
