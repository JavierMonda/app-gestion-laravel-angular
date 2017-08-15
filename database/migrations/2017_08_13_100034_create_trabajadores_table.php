<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrabajadoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trabajadores', function (Blueprint $table) {
            $table->string('DNI',9)->unique();
            $table->string('foto',90)->nullable();
            $table->string('nombreApellidos',45);
            $table->date('FechaIni');
            $table->date('FechaFin');
            $table->text('Observaciones')->nullable();
            $table->string('tipoContrato',45);
            $table->integer('vacaciones')->unsigned();
            $table->string('nombreDepartamentoTrabajador',45);
            $table->foreign('nombreDepartamentoTrabajador')->references('nombreDepartamento')->on('departamentos');
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
        Schema::table('trabajadores', function (Blueprint $table) {
            $table->dropForeign('trabajadores_nombredepartamentotrabajador_foreign');
        });
        Schema::dropIfExists('trabajadores');
    }
}
