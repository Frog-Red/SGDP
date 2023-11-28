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

    public function rolPastoral()
    {
        return $this->belongsTo(rol_pastoral::class, 'CodigoRol', 'NombreRol');
    }

    protected static function boot()
    {
        parent::boot();

    static::created(function ($rol_diacono) {
        // Assign the event type based on your logic
        $eventType = '4'; // Change this based on your actual logic
        historial_diacono::create([
            'RutDiacono' => $rol_diacono->RutDiacono,
            'NumeroSecuenciaEvento' => $rol_diacono->id,
            'CodigoTipoEvento' => 'Asignacion de Rol',
            'FechaEvento' => now(),
            'ComentariosEvento' => 'Se asignó el rol ' . $rol_diacono->CodigoRol, // You can customize this message
            'CodigoUsuarioRegistro' => auth()->user()->id, // Assuming you have an authenticated user
        ]);
    });

    static::deleted(function ($rol_diacono) {
        // Assign the event type based on your logic
        $eventType = '5'; // Change this based on your actual logic
        historial_diacono::create([
            'RutDiacono' => $rol_diacono->RutDiacono,
            'NumeroSecuenciaEvento' => $rol_diacono->id,
            'CodigoTipoEvento' => 'Eliminacion de Rol',
            'FechaEvento' => now(),
            'ComentariosEvento' => 'Se elimino el rol ' . $rol_diacono->CodigoRol , // You can customize this message
            'CodigoUsuarioRegistro' => auth()->user()->id, // Assuming you have an authenticated user
        ]);
    });

    }


    protected $table = 'rol_diacono';

    protected $primaryKey = 'id';

    public $timestamps = true;

    // Define relationships if any
}
