<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatLugarDeTrabajoEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cat__lugar__de__trabajo__empleados', function (Blueprint $table) {
            $table->unsignedBigInteger('Id_empleado_F');
            $table->foreign('Id_empleado_F')->references('id')->on('empleados')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('Id_lugar_de_trabajo_F');
            $table->foreign('Id_lugar_de_trabajo_F')->references('id')->on('lugar__de__trabajos')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('cat__lugar__de__trabajo__empleados');
    }
}
