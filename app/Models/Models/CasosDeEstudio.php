<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CasosDeEstudio extends Model
{
    use HasFactory;
    protected $table = 'casos_de_estudio';
    protected $primaryKey = 'id_casoEstudio';

    protected $fillable = [
        'descripcion_caso',
        'estado',
        'id_area',
        'nombre_archivo'
    ];
    public $timestamps = false;

    public function area(){
        return $this->belongsTo(Area::class,'id_area');
    }
    
    public static function getRandomCaseByArea($areaId)
    {
        return self::where('id_area', $areaId)->inRandomOrder()->first();
    }
}
