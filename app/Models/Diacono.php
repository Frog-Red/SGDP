<?php
// app/Models/Diacono.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diacono extends Model
{
    protected $fillable = [
        'nombre',
        'rut',
        'estadoVigencia',
        'fechaNacimiento',
        'fechaOrdenacion',
        'lugarOrdenacion',
        'nombreObispoOrdeno',
        'profesionOficio',
        'parroquiaAsignada',
        'vicariaAmbientalAsignada',
        'direccionParticular',
        'telefonoCelular',
        'telefonoFijo',
        'correoElectronico',
        'indicadorDefuncion',
        'fechaDefuncion',
        'estadoCivil',
        'nombreEsposa',
        'rutEsposa',
        'fechaNacimientoEsposa',
        'fechaMatrimonio',
        'fechaDefuncionEsposa',
        '_token', // Add this line to allow mass assignment for _token
    ];

    protected $table = 'diaconos'; // Add this line if your table name is different

    protected $primaryKey = 'id'; // Add this line if your primary key column is different

    public $timestamps = true; // Set to false if you don't want timestamps (created_at, updated_at)

    public function hijos()
    {
        return $this->hasMany(Hijo::class, 'RutDiáconoPadre', 'Rut');
    }
    // Additional model configurations or relationships can be added here
}
