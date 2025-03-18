<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoTitulo extends Model
{
    use HasFactory;
    protected $table = 'tipo_titulo';
    protected $primaryKey = 'id_tipoTitulo';
    public $timestamps = false;

    protected $fillable = [
        'titulo',
    ];

    // Relación con TipoAdministrador
    public function tipoAdministradores()
    {
        return $this->hasMany(TipoAdministrador::class, 'id_tipoTitulo', 'id_tipoTitulo');
    }
}
