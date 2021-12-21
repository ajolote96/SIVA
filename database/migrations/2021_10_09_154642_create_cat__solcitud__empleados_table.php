<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatSolcitudEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cat__solcitud__empleados', function (Blueprint $table) {
            $table->unsignedBigInteger('Id_empleado_F');
            $table->foreign('Id_empleado_F')->references('id')->on('empleados')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('Id_solicitud_F');
            $table->foreign('Id_solicitud_F')->references('id')->on('solicitudes')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('cat__solcitud__empleados');
    }
}
