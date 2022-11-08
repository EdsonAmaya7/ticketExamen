<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicektsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticekts', function (Blueprint $table) {
            $table->id();

            $table->string('folio');
            $table->string('nombreTramite');
            $table->string('nombre');
            $table->string('paterno');
            $table->string('materno');

            $table->unsignedBigInteger('nivelIngresar_id');
            $table->foreign('nivelIngresar_id')->references('id')->on('niveles');
            $table->string('municipio');
            $table->string('asunto');

            $table->string('status'); //pendiente o resuelto
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
        Schema::dropIfExists('ticekts');
    }
}
