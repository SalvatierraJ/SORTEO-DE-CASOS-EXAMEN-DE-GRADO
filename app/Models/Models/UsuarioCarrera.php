<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuarioCarrera extends Model
{
    use HasFactory;

    protected $table = 'usuario_carrera';
    protected $primaryKey = 'id_usuarioCarrera';
    public $timestamps = false;

    protected $fillable = [
        'id_carrera',
        'id_administrador',
        'estado',
    ];

    // Relación con Carrera
    public function carrera()
    {
        return $this->belongsTo(Carrera::class, 'id_carrera', 'id_carrera');
    }

    // Relación con Administrador
    public function administrador()
    {
        return $this->belongsTo(Administrador::class, 'id_administrador', 'id_administrador');
    }
}
