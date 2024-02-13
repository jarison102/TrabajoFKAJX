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
        Schema::create('ciudad_departamento', function (Blueprint $table) {
            $table->id(); // Esta línea agrega un campo id a la tabla
            $table->unsignedBigInteger('ciudad_id');
            $table->unsignedBigInteger('departamento_id');
            $table->foreign('ciudad_id')->references('id')->on('ciudades');
            $table->foreign('departamento_id')->references('id')->on('departamentos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ciudad_departamento');
    }
};
