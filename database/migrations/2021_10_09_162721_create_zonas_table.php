<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zonas', function (Blueprint $table) {
            $table->id();
            $table->string('Nombre');
            $table->text('Descripcion');
            $table->string('Codigo');

            $table->unsignedBigInteger('Id_division_F');
            $table->foreign('Id_division_F')->references('id')->on('divisiones')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('zonas');
    }
}
