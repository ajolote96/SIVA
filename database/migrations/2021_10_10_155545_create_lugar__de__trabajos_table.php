<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLugarDeTrabajosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lugar__de__trabajos', function (Blueprint $table) {
            $table->id();
            $table->string('Nombre');
            $table->text('Descripcion');
            $table->string('Codigo');

            $table->unsignedBigInteger('Id_division_F');
            $table->foreign('Id_division_F')->references('id')->on('divisiones')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('Id_zona_F');
            $table->foreign('Id_zona_F')->references('id')->on('zonas')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('Id_departamento_F');
            $table->foreign('Id_departamento_F')->references('id')->on('departamentos')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('lugar__de__trabajos');
    }
}
