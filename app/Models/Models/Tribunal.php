<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tribunal extends Model
{
    use HasFactory;
    protected $table='tribunal';
    protected $primaryKey = 'id_tribunal';

    protected $fillable = [
        'registro',
        'nombre',
        'apellido',
        'telefono',
        'correo',
        'estado'
    ];
    public $timestamps = false;
}
