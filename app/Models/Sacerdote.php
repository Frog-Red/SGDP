<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sacerdote extends Model
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
            'numeroDecreto',
            'direccionParticular',
            'telefonoCelular',
            'telefonoFijo',
            'correoElectronico',
            'indicadorDefuncion',
            'fechaDefuncion',
            '_token', // Add this line to allow mass assignment for _token
        ];
    
        protected $table = 'sacerdotes'; // Add this line if your table name is different
    
        protected $primaryKey = 'id'; // Add this line if your primary key column is different
    
        public $timestamps = true; // Set to false if you don't want timestamps (created_at, updated_at)
    
        public function hijos()
        {
            return $this->hasMany(Hijo::class, 'RutDiáconoPadre', 'Rut');
        }
        public function roles()
        {
            return $this->hasMany(rol_diacono::class, 'RutDiacono', 'Rut');
        }
        public function historial_diacono()
        {
            return $this->hasMany(historial_diacono::class, 'RutDiacono', 'Rut');
        }
        // Additional model configurations or relationships can be added here
    }

