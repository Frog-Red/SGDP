<?php

// app/Models/RolPastoral.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class rol_pastoral extends Model
{
    protected $fillable = [
        'CodigoRolPastoral',
        'NombreRol',
        'DescripcionRol',
    ];

    protected $table = 'rol_pastoral';

    protected $primaryKey = 'id';

    public $timestamps = true;

    // Define relationships if any
}
