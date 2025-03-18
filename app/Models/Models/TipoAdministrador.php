<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoAdministrador extends Model
{
    use HasFactory;
    protected $table = 'tipo_administrador';
    protected $primaryKey = 'id_tipoAdministrador';
    public $timestamps = false;

    protected $fillable = [
        'id_administrador',
        'id_tipoTitulo',
    ];


    public function administrador()
    {
        return $this->belongsTo(Administrador::class, 'id_administrador', 'id_administrador');
    }

    
    public function tipoTitulo()
    {
        return $this->belongsTo(TipoTitulo::class, 'id_tipoTitulo', 'id_tipoTitulo');
    }
}
