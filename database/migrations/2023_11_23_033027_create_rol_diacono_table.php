<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolDiaconoTable extends Migration
{
    public function up()
    {
        Schema::create('rol_diacono', function (Blueprint $table) {
            $table->id();
            $table->string('RutDiacono');
            $table->string('CodigoRol');
            $table->date('FechaAsignacionRol');
            $table->text('ComentarioAsignacionRol');
            $table->string('NombreAsignadorRol');
            $table->string('CodigoUsuarioRegistro');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rol_diacono');
    }
}

