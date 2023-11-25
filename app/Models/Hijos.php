<?php

// app/Models/Hijo.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hijos extends Model
{
    protected $fillable = [
        'RutDiáconoPadre',
        'RutHijo',
        'SexoHijo',
        'NombreHijo',
        'FechaNacimientoHijo',
    ];

    protected $table = 'hijos';

    protected $primaryKey = 'id';

    public $timestamps = true;

    public function padre()
    {
        return $this->belongsTo(Diacono::class, 'RutDiáconoPadre', 'Rut');
    }
    // Define relationships if any
    // For example, if Hijo belongs to Diacono
    // public function diacono()
    // {
    //     return $this->belongsTo(Diacono::class, 'rut_del_diacono', 'rut');
    // }
}
