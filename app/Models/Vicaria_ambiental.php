<?php

// app/Models/VicariaAmbiental.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vicaria_ambiental extends Model
{
    protected $fillable = [
        'CodigoVicariaAmbiental',
        'NombreVicariaAmbiental',
        'DireccionVicariaAmbiental',
        'TelefonoVicariaAmbiental',
        'CorreoElectronicoVicariaAmbiental',
        'NombreVicario',
    ];

    protected $table = 'vicaria_ambiental';

    protected $primaryKey = 'id';

    public $timestamps = true;

    // Define relationships if any
}
