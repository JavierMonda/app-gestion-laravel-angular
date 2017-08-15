<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatafonosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datafonos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('numTPV',20);
            $table->string('numComercio',45);
            $table->string('banco',45);
            $table->enum('conexion',['gprs','ethernet']);          
            $table->integer('idCentroDatafonos')->unsigned()->unique();
            $table->foreign('idCentroDatafonos')->references('idCentro')->on('centros')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::table('datafonos', function (Blueprint $table) {
            $table->dropForeign('datafonos_idcentrodatafonos_foreign');
        });
        Schema::dropIfExists('datafonos');
    }
}
