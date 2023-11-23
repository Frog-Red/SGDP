<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiaconosTable extends Migration
{
    public function up()
    {
        Schema::create('diaconos', function (Blueprint $table) {
            $table->id();
            $table->string('Nombre');
            $table->string('Rut')->unique();
            $table->string('EstadoVigencia');
            $table->date('FechaNacimiento');
            $table->date('FechaOrdenacion');
            $table->string('LugarOrdenacion');
            $table->string('NombreObispoOrdeno');
            $table->string('ProfesionOficio');
            $table->string('ParroquiaAsignada')->nullable();
            $table->string('VicariaAmbientalAsignada')->nullable();
            $table->string('DireccionParticular');
            $table->string('TelefonoCelular');
            $table->string('TelefonoFijo');
            $table->string('CorreoElectronico');
            $table->boolean('IndicadorDefuncion')->default(false);
            $table->date('FechaDefuncion')->nullable();
            $table->string('EstadoCivil');
            $table->string('NombreEsposa')->nullable();
            $table->string('RutEsposa')->nullable();
            $table->date('FechaNacimientoEsposa')->nullable();
            $table->date('FechaMatrimonio')->nullable();
            $table->date('FechaDefuncionEsposa')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('diaconos');
    }
}

