<?php

// app/Models/TipoEvento.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tipo_evento extends Model
{
    protected $fillable = [
        'CodigoTipoEvento',
        'NombreTipoEvento',
        'DescripcionTipoEvento',
    ];

    protected $table = 'tipo_evento';

    protected $primaryKey = 'id';

    public $timestamps = true;

    // Define relationships if any
}

