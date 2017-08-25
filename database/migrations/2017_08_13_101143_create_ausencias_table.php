<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAusenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ausencias', function (Blueprint $table) {
            $table->increments('idAusencia');
            $table->date('fechaAusencia');
            $table->enum('tipoAusencia',['baja','vacaciones','absentismo','permiso']);
            $table->string('descripcion',90)->nullable();
            $table->string('DNIAusencia',9);
            $table->foreign('DNIAusencia')->references('DNI')->on('trabajadores')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::table('ausencias', function(Blueprint $table) {
            $table->dropForeign('ausencias_dniausencia_foreign');
        });
        Schema::dropIfExists('ausencias');
    }
}
