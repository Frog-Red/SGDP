<?php

// app/Models/RolDiacono.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class rol_diacono extends Model
{
    protected $fillable = [
        'RutDiacono',
        'CodigoRol',
        'FechaAsignacionRol',
        'ComentarioAsignacionRol',
        'NombreAsignadorRol',
        'CodigoUsuarioRegistro',
    ];

    protected $table = 'rol_diacono';

    protected $primaryKey = 'id';

    public $timestamps = true;

    // Define relationships if any
}
