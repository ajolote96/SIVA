<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDireccionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('direccions', function (Blueprint $table) {
            $table->id();

            $table->string('colonia');
            $table->string('calle');
            $table->string('exterior');
            $table->string('interior');
            $table->string('tipo');
            $table->string('entre1');
            $table->string('entre2');
            $table->integer('codigo');

            $table->unsignedBigInteger('Domicilio')->unique()->nullable();
            $table->foreign('Domicilio')
            ->references('id')->on('empleados')->onDelete('cascade')->onUpdate('cascade');



            
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
        Schema::dropIfExists('direccions');
    }
}
