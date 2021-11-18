<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitudes', function (Blueprint $table) {
            $table->id();
            $table->string('RPE');
            $table->string('Nombre');
            $table->text('Descripcion');
            $table->date('FechaInicio');
            $table->date('FechaFin');
<<<<<<< HEAD
            $table->enum('autoriza_sec', ['0','1'])->nullable();
            $table->enum('autoriza_jefe', ['0','1'])->nullable();
            $table->string('autoriza_email')->nullable();

=======
            $table->enum('autoriza_sec',['0','1'])->nullable();
            $table->enum('autoriza_jefe',['0','1'])->nullable();
            $table->string('autoriza_email')->nullable();
>>>>>>> 0b01479ce7c3ef41139cc22de5918340d728a534
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
        Schema::dropIfExists('solicitudes');
    }
}
