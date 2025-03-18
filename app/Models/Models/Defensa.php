<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Defensa extends Model
{
    use HasFactory;
    use HasFactory;

    protected $table = 'defensa';
    protected $primaryKey = 'id_defensa';
    public $timestamps = false;

    protected $fillable = [
        'fecha',
        'tipo_defensa',
        'nota',
        'id_casoEstudio',
        'id_estudiante',
        'id_administrador',
    ];

    // Relación con Estudiante
    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class, 'id_estudiante', 'id_estudiante');
    }

    // Relación con Administrador
    public function administrador()
    {
        return $this->belongsTo(Administrador::class, 'id_administrador', 'id_administrador');
    }

    // Relación con Casos de Estudio
    public function casoEstudio()
    {
        return $this->belongsTo(CasosDeEstudio::class, 'id_casoEstudio', 'id_casoEstudio');
    }

    // Relación con Tribunal (Many-to-Many)
    public function tribunales()
    {
        return $this->belongsToMany(
            Tribunal::class,
            'tribunal_defensa',
            'id_defensa',
            'id_tribunal'
        );
    }
    public function tribunaldefensa()
    {
        return $this->belongsToMany(Tribunal::class, 'tribunal_defensa', 'id_defensa', 'id_tribunalDefensa');
    }
}
