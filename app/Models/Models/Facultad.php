<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facultad extends Model
{
    use HasFactory;
    protected $table = 'facultad';
    protected $primaryKey = 'id_facultad';
    public function carrera()
    {
        return $this->hasMany(Carrera::class, 'id_facultad');
    }
}
