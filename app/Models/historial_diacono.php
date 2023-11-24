<?php

// app/Models/HistorialDiacono.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class historial_diacono extends Model
{
    protected $fillable = [
        'RutDiacono',
        'NumeroSecuenciaEvento',
        'CodigoTipoEvento',
        'FechaEvento',
        'ComentariosEvento',
        'CodigoUsuarioRegistro',
    ];

    protected $table = 'historial_diacono';

    protected $primaryKey = 'id';

    public $timestamps = true;

    // Define relationships if any
}
