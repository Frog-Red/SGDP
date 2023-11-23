<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVicariaAmbientalTable extends Migration
{
    public function up()
    {
        Schema::create('vicaria_ambiental', function (Blueprint $table) {
            $table->id();
            $table->string('CodigoVicariaAmbiental');
            $table->string('NombreVicariaAmbiental');
            $table->string('DireccionVicariaAmbiental');
            $table->string('TelefonoVicariaAmbiental');
            $table->string('CorreoElectronicoVicariaAmbiental');
            $table->string('NombreVicario');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('vicaria_ambiental');
    }
}

