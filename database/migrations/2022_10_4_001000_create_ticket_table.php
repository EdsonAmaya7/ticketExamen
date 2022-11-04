<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->string('folio');
            $table->string('nombreTramite');
            $table->string('nombre');
            $table->string('paterno');
            $table->string('materno');

            $table->string('nivelIngresar');
            $table->string('municipio');
            $table->string('asunto');

            $table->string('status'); //pendiente o resuelto

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
