<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrabajadorTlfsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trabajadortlfs', function (Blueprint $table) {
            $table->string('DNITrabajadorTlf',9);
            $table->string('TlfTrabajador',9);
            $table->unique(array('DNITrabajadorTlf','TlfTrabajador'));
            $table->foreign('DNITrabajadorTlf')->references('DNI')->on('trabajadores')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::table('trabajadortlfs', function(Blueprint $table) {
            $table->dropForeign('trabajadortlfs_dnitrabajadortlf_foreign');
        });
        Schema::dropIfExists('trabajadortlfs');
    }
}
