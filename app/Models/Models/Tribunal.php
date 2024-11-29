<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tribunal extends Model
{
    use HasFactory;
    protected $table = 'tribunal';
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

    public function defensa()
    {
        return $this->belongsToMany(Defensa::class, 'tribunal_defensa', 'id_tribunal', 'id_defensa');
    }
    public function tribunalDefensas()
    {
        return $this->hasMany(TribunalDefensa::class, 'id_tribunal');
    }
}
