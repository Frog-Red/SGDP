<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHijosTable extends Migration
{
    public function up()
    {
        Schema::create('hijos', function (Blueprint $table) {
            $table->id();
            $table->string('RutDiáconoPadre');
            $table->string('RutHijo')->unique();
            $table->string('SexoHijo');
            $table->string('NombreHijo');
            $table->date('FechaNacimientoHijo');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('hijos');
    }
}
