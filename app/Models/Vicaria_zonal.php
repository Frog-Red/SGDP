<?php

// app/Models/VicariaZonal.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vicaria_Zonal extends Model
{
    protected $fillable = [
        'CodigoVicariaZonal',
        'NombreVicariaZonal',
        'DireccionVicariaZonal',
        'TelefonoVicariaZonal',
        'CorreoElectronicoVicariaZonal',
        'NombreVicarioZonal',
    ];

    protected $table = 'vicaria_zonal';

    protected $primaryKey = 'id';

    public $timestamps = true;

    // Define relationships if any
}
