<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistorialDiaconoTable extends Migration
{
    public function up()
    {
        Schema::create('historial_diacono', function (Blueprint $table) {
            $table->id();
            $table->string('RutDiacono');
            $table->integer('NumeroSecuenciaEvento');
            $table->string('CodigoTipoEvento');
            $table->date('FechaEvento');
            $table->text('ComentariosEvento');
            $table->string('CodigoUsuarioRegistro');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('historial_diacono');
    }
}

