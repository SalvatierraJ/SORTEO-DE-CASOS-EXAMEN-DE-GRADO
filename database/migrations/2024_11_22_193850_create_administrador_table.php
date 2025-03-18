<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('administrador', function (Blueprint $table) {
            $table->integer('id_administrador', true);
            $table->string('nombre', 100)->nullable();
            $table->string('apellido', 100)->nullable();
            $table->string('usuario', 50)->nullable();
            $table->string('password', 500)->nullable();
            $table->string('correo', 100)->nullable();
            $table->string('telefono', 15)->nullable();
            $table->string('estado', 50)->nullable();
        });
        $administradores = [
            ['nombre' => 'Gustavo', 'apellido' => 'Perez Flores'],
            ['nombre' => 'Juan Ernesto', 'apellido' => 'Ribera Torrez'],
            ['nombre' => 'Jonny', 'apellido' => 'Aguilera Cernades'],
            ['nombre' => 'Gabriel', 'apellido' => 'Cabezas Gutierrez'],
            ['nombre' => 'Aidee', 'apellido' => 'Flores Rodriguez'],
            ['nombre' => 'Onel Caridad', 'apellido' => 'Linares Rodriguez'],
            ['nombre' => 'Alejandra', 'apellido' => 'Caballero Contreras'],
            ['nombre' => 'Aracely', 'apellido' => 'Mendez Carreño'],
            ['nombre' => 'Viviana', 'apellido' => 'Sandoval Rios'],
            ['nombre' => 'Daniel', 'apellido' => 'Mendoza Morales'],
            ['nombre' => 'Maria Renee', 'apellido' => 'Montenegro Muñoz'],
            ['nombre' => 'Juan Carlos', 'apellido' => 'Peña Gutierrez'],
            ['nombre' => 'Jean Paul', 'apellido' => 'Guzman Castro'],
            ['nombre' => 'Pedro', 'apellido' => 'Saavedra Romero'],
            ['nombre' => 'Maria Renee', 'apellido' => 'Montenegro Muñoz'],
            ['nombre' => 'Erika', 'apellido' => 'Defilippis Chavez'],
            ['nombre' => 'Libby Lisbeth', 'apellido' => 'Alvarez Hidalgo'],
        ];

        foreach ($administradores as $admin) {
            $usuario = strtolower(substr($admin['nombre'], 0, 1) . str_replace(' ', '', $admin['apellido']));
            DB::table('administrador')->insert([
                'nombre' => $admin['nombre'],
                'apellido' => $admin['apellido'],
                'usuario' => $usuario,
                'password' => Hash::make('12345678'),
                'estado' => 'activo',
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('administrador');
    }
};
