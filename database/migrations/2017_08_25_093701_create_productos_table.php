<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->string('codigo',50)->unique();
            $table->string('nombreProducto',45);
            $table->integer('cantidad')->unsigned();
            $table->text('descripcionProducto')->nullable();
            $table->string('ubicacion',45);
            $table->string('nombreDepartamentoProducto',45);
            $table->foreign('nombreDepartamentoProducto')->references('nombreDepartamento')->on('departamentos')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::table('productos', function (Blueprint $table) {
            $table->dropForeign('productos_nombredepartamentoproducto_foreign');
        });
        Schema::dropIfExists('productos');
    }
}
