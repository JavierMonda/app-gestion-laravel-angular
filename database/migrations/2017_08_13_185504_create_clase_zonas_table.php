<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClaseZonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clase_zonas', function (Blueprint $table) {
            $table->string('nombreClaseZona',45);
            $table->string('zona',45);
            $table->unique(array('nombreClaseZona','zona'));
            $table->foreign('nombreClaseZona')->references('nombreClase')->on('clases');
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
        Schema::table('clase_zonas', function (Blueprint $table) {
            $table->dropForeign('clase_zonas_nombreclasezona_foreign');
        });
        Schema::dropIfExists('clase_zonas');
    }
}
