<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrador extends Model
{
    use HasFactory;

    protected $table = 'administrador';
    protected $primaryKey = 'id_administrador';
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'apellido',
        'usuario',
        'password',
        'correo',
        'telefono',
        'estado',
    ];

    public function tipoAdministrador()
    {
        return $this->hasOne(TipoAdministrador::class, 'id_administrador', 'id_administrador');
    }

    public function usuarioCarrera()
    {
        return $this->hasMany(UsuarioCarrera::class, 'id_administrador', 'id_administrador');
    }

    public function defensas()
    {
        return $this->hasMany(Defensa::class, 'id_administrador', 'id_administrador');
    }
}
