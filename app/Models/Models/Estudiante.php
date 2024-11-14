<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;

    protected $table = 'estudiante';
    protected $primaryKey = 'id_estudiante';

    protected $fillable = [
        'nroRegistro',
        'nombre',
        'apellido',
        'telefono',
        'correo',
        'id_carrera',
    ];

    public function carrera()
    {
        return $this->belongsTo(Carrera::class, 'id_carrera');
    }

    public function defensa()
    {
        return $this->hasMany(Defensa::class, 'id_estudiante');
    }
    public $timestamps = false;
}
