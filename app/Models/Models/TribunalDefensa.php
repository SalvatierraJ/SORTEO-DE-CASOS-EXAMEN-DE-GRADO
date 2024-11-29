<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TribunalDefensa extends Model
{
    use HasFactory;
    protected $table = 'tribunal_defensa';
    protected $primaryKey = 'id_tribunalDefensa';

    protected $fillable = [
        'id_tribunal',
        'id_defensa'
    ];

    public function tribunal()
    {
        return $this->belongsTo(Tribunal::class, 'id_tribunal');
    }

    public function defensa()
    {
        return $this->belongsToMany(Defensa::class, 'tribunal_defensa', 'id_tribunal', 'id_defensa');
    }
    public $timestamps = false;
}
