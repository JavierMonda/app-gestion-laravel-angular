<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncidenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incidencias', function (Blueprint $table) {
            $table->increments('idIncidencia');
            $table->date('fechaIncidencia');
            $table->text('descripcionIncidencia');
            $table->enum('estadoIncidencia',['pendiente','solucionado'])->default('pendiente');
            $table->text('observacionesIncidencia')->nullable();
            $table->string('nombreDepartamentoIncidencia',45);
            $table->foreign('nombreDepartamentoIncidencia')->references('nombreDepartamento')->on('departamentos')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::table('incidencias', function (Blueprint $table) {
            $table->dropForeign('incidencias_nombredepartamentoincidencia_foreign');
        });
        Schema::dropIfExists('incidencias');
    }
}
