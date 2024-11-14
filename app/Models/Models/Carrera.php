<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    use HasFactory;
    protected $table = 'carrera';

    protected $primaryKey = 'id_carrera';

    public function facultad()
    {
        return $this->belongsTo(Facultad::class, 'id_facultad');
    }

    public function estudiante()
    {
        return $this->hasMany(Estudiante::class, 'id_carrera','id_carrera');
    }
}
