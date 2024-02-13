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
        Schema::create('departamento_pais', function (Blueprint $table) {
            $table->id(); // Esta línea agrega un campo id a la tabla
            $table->unsignedBigInteger('departamento_id');
            $table->unsignedBigInteger('pais_id');
            $table->foreign('departamento_id')->references('id')->on('departamentos');
            $table->foreign('pais_id')->references('id')->on('paises');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('departamento_pais');
    }
};
