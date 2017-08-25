<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRealizacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('realizacions', function (Blueprint $table) {
            $table->integer('idTrabajosRealiza')->unsigned();
            $table->string('DNIRealiza',9);
            $table->unique(array('idTrabajosRealiza','DNIRealiza'));
            $table->date('fechaRealiza');
            $table->timestamp('horaIni');
            $table->timestamp('horaFin');
            $table->foreign('idTrabajosRealiza')->references('idTrabajos')->on('trabajos')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('DNIRealiza')->references('DNI')->on('trabajadores')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::table('realizacions', function (Blueprint $table) {
            $table->dropForeign('realizacions_dnirealiza_foreign');
            $table->dropForeign('realizacions_idtrabajosrealiza_foreign');
        });
        Schema::dropIfExists('realizacions');
    }
}
