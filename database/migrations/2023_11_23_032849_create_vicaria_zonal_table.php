<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVicariaZonalTable extends Migration
{
    public function up()
    {
        Schema::create('vicaria_zonal', function (Blueprint $table) {
            $table->id();
            $table->string('CodigoVicariaZonal');
            $table->string('NombreVicariaZonal');
            $table->string('DireccionVicariaZonal');
            $table->string('TelefonoVicariaZonal');
            $table->string('CorreoElectronicoVicariaZonal');
            $table->string('NombreVicarioZonal');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('vicaria_zonal');
    }
}

