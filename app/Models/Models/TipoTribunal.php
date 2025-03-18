<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoTribunal extends Model
{
    use HasFactory;

    protected $table = 'tipo_tribunal';
    protected $primaryKey = 'id_tipoTribunal';
    public $timestamps = false;

    protected $fillable = [
        'id_tipoTitulo',
        'id_tribunal',
    ];

    // Relación con TipoTitulo
    public function tipoTitulo()
    {
        return $this->belongsTo(TipoTitulo::class, 'id_tipoTitulo', 'id_tipoTitulo');
    }

    // Relación con Tribunal
    public function tribunal()
    {
        return $this->belongsTo(Tribunal::class, 'id_tribunal', 'id_tribunal');
    }
}
