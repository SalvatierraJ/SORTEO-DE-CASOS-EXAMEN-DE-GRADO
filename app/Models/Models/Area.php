<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;
    protected $table = 'area';
    protected $primaryKey = 'id_area';

    protected $fillable = [
        'nombre_area',
        'id_carrera',
    ];
    public $timestamps = false;

    public function CasosDeEstudio(){
        return $this->hasOne(CasosDeEstudio::class,'id_area');
    }
}
