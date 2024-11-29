<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Defensa extends Model
{
    use HasFactory;

    protected $table = 'defensa';
    protected $primaryKey = 'id_defensa';

    protected $fillable = [
        'fecha',
        'tipo_defensa',
        'nota',
        'id_casoEstudio',
        'id_estudiante',
        'id_administrador'
    ];

    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class, 'id_estudiante');
    }
    public function tribunaldefensa()
    {
        return $this->belongsToMany(Tribunal::class, 'tribunal_defensa', 'id_defensa', 'id_tribunal');
    }

    public $timestamps = false;
}
