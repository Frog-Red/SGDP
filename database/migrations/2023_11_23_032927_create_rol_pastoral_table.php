<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolPastoralTable extends Migration
{
    public function up()
    {
        Schema::create('rol_pastoral', function (Blueprint $table) {
            $table->id();
            $table->string('CodigoRolPastoral');
            $table->string('NombreRol');
            $table->string('DescripcionRol');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rol_pastoral');
    }
}

