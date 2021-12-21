<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->string('Nombre');
            $table->string('ApellidoPaterno');
            $table->string('ApellidoMaterno');
            $table->string('Contrato');
            $table->string('IdLugarDeTrabajo');
            $table->string('RPE');
            $table->string('IMMS');
            $table->date('FechaIngreso');
            $table->string('RFC');
            $table->string('TipoSangre');
            $table->string('Alergias');
            $table->string('Padecimientos');
            //$table->string('Rol');
            $table->string('Domicilio');
            $table->bigInteger('TelefonoCasa');
            $table->bigInteger('TelefonoCelular');
            $table->date('FechaNacimiento');
            $table->string('CorreoElectronico');
            $table->string('Sexo');
            $table->string('EstadoCivil');
            $table->string('ContactoEmergencia');
            $table->bigInteger('TelefonoEmergencia');
            $table->text('CursosParticipaba');

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
        Schema::dropIfExists('empleados');
    }
}
