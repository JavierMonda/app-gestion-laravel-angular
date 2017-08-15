<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCentrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('centros', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idCentro');
            $table->string('nombreCentro',45);
            $table->string('CIFCentro',9);
            $table->foreign('CIFCentro')
                 ->references('CIF')->on('empresas')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::table('centros', function (Blueprint $table) {
            $table->dropForeign('centros_cifcentro_foreign');
        });
        Schema::dropIfExists('centros');

    }
}
