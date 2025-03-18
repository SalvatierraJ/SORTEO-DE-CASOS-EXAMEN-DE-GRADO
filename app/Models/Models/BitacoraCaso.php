<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BitacoraCaso extends Model
{
    use HasFactory;
    protected $table = 'bitacora_caso';
    protected $primaryKey = 'id_bitacora';
    public $timestamps = false;

    protected $fillable = [
        'descripcion',
        'fecha',
        'hora',
        'id_casoEstudio',
    ];

    // Relación con CasosDeEstudio
    public function casoDeEstudio()
    {
        return $this->belongsTo(CasosDeEstudio::class, 'id_casoEstudio', 'id_casoEstudio');
    }
}
