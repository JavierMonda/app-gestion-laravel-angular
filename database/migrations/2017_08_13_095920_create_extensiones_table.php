<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExtensionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('extensiones', function (Blueprint $table) {
            $table->integer('numero')->unsigned();
            $table->integer('numPuerto',3);
            $table->string('nombreDepartamentoExtension',45);
            $table->foreign('nombreDepartamentoExtension')->references('nombreDepartamento')->on('departamentos')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::table('extensiones', function (Blueprint $table) {
            $table->dropForeign('extensiones_nombredepartamentoextension_foreign');
        });
        Schema::dropIfExists('extensiones');
    }
}
