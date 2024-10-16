<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Usuario extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * Nombre de la tabla asociada con el modelo.
     *
     * @var string
     */
    protected $table = 'usuario';

    /**
     * La clave primaria asociada con la tabla.
     *
     * @var string
     */
    protected $primaryKey = 'id_usuario';

    /**
     * Los atributos que se pueden asignar en masa.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_persona',
        'id_carrera',
        'rol',
        'usuario',  // El campo de nombre de usuario
        'password', // El campo de contraseña
    ];

    /**
     * Los atributos que deben estar ocultos para los arrays.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * El nombre del campo que contiene la contraseña.
     * Laravel por defecto busca `password`, pero tu campo es `contrasena`.
     */
    public function getAuthPassword()
    {
        return $this->password;  // Indica que la columna es 'contrasena'
    }

    /**
     * Indicar si la tabla tiene timestamps.
     */
    public $timestamps = false;
}
