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
    
    public function rolDiaconos()
    {
        return $this->hasMany(rol_diacono::class, 'CodigoRol', 'NombreRol');
    }
    public $timestamps = true;

    // Define relationships if any
}
