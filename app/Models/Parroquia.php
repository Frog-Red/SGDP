<?php

// app/Models/Parroquia.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parroquia extends Model
{
    protected $fillable = [
        'CodigoParroquia',
        'NombreParroquia',
        'DireccionParroquia',
        'TelefonoParroquia',
        'CorreoElectronicoParroquia',
        'VicariaZonalPertenece',
        'NombreParroco',
    ];

    protected $table = 'parroquia';

    protected $primaryKey = 'id';

    public $timestamps = true;

    // Define relationships if any
}

