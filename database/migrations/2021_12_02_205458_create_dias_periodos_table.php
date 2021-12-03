<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiasPeriodosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dias_periodos', function (Blueprint $table) {
            $table->string('RPE',100);
		    $table->string('Fecha_ingreso',100);
		    $table->integer('Dias_Disponibles_22',11);
		    $table->integer('Dias_Estimados_22',11);
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
        Schema::dropIfExists('dias_periodos');
    }
}
