<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParroquiaTable extends Migration
{
    public function up()
    {
        Schema::create('parroquia', function (Blueprint $table) {
            $table->id();
            $table->string('CodigoParroquia');
            $table->string('NombreParroquia');
            $table->string('DireccionParroquia');
            $table->string('TelefonoParroquia');
            $table->string('CorreoElectronicoParroquia');
            $table->string('VicariaZonalPertenece');
            $table->string('NombreParroco');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('parroquia');
    }
}
