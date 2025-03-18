<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('usuario_carrera', function (Blueprint $table) {
            $table->integer('id_usuarioCarrera', true);
            $table->integer('id_carrera')->nullable()->index('id_carrera');
            $table->integer('id_administrador')->nullable()->index('id_administrador');
            $table->string('estado', 50)->nullable();
        });
        // Insertar las relaciones entre administradores y carreras
        $relaciones = [
            ['id_carrera' => 1, 'id_administrador' => 1, 'estado' => 'activo'], // Ingeniería de Sistemas -> Gustavo Perez Flores
            ['id_carrera' => 2, 'id_administrador' => 1, 'estado' => 'activo'], // Ingeniería en Redes y Telecomunicaciones -> Gustavo Perez Flores
            ['id_carrera' => 3, 'id_administrador' => 2, 'estado' => 'activo'], // Ingeniería Industrial y Comercial -> Juan Ernesto Ribera Torrez
            ['id_carrera' => 4, 'id_administrador' => 3, 'estado' => 'activo'], // Ingeniería Mecanica Automotriz y Agroindustrial -> Jonny Aguilera Cernades
            ['id_carrera' => 5, 'id_administrador' => 4, 'estado' => 'activo'], // Ingeniería Electrónica y Sistemas -> Gabriel Cabezas Gutierrez
            ['id_carrera' => 6, 'id_administrador' => 5, 'estado' => 'activo'], // Ingeniería en Administración Petrolera -> Aidee Flores Rodriguez
            ['id_carrera' => 7, 'id_administrador' => 6, 'estado' => 'activo'], // Ingeniería Eléctrica -> Onel Caridad Linares Rodriguez
            ['id_carrera' => 8, 'id_administrador' => 7, 'estado' => 'activo'], // Administración de Turismo -> Alejandra Caballero Contreras
            ['id_carrera' => 9, 'id_administrador' => 8, 'estado' => 'activo'], // Administración Financiera / Ingeniería Financiera -> Aracely Mendez Carreño
            ['id_carrera' => 10, 'id_administrador' => 9, 'estado' => 'activo'], // Administración General -> Viviana Sandoval Rios
            ['id_carrera' => 11, 'id_administrador' => 10, 'estado' => 'activo'], // Auditoría Financiera / Contaduría Pública -> Daniel Mendoza Morales
            ['id_carrera' => 12, 'id_administrador' => 11, 'estado' => 'activo'], // Comercio Internacional -> Maria Renee Montenegro Muñoz
            ['id_carrera' => 13, 'id_administrador' => 12, 'estado' => 'activo'], // Comunicación Estratégica y Digital -> Juan Carlos Peña Gutierrez
            ['id_carrera' => 14, 'id_administrador' => 13, 'estado' => 'activo'], // Ingeniería Comercial -> Jean Paul Guzman Castro
            ['id_carrera' => 15, 'id_administrador' => 14, 'estado' => 'activo'], // Ingeniería en Marketing y Publicidad -> Pedro Saavedra Romero
            ['id_carrera' => 16, 'id_administrador' => 11, 'estado' => 'activo'], // Relaciones Internacionales -> Maria Renee Montenegro Muñoz
            ['id_carrera' => 17, 'id_administrador' => 15, 'estado' => 'activo'], // Derecho -> Erika Defilippis Chavez
            ['id_carrera' => 18, 'id_administrador' => 16, 'estado' => 'activo'], // Psicología -> Libby Lisbeth Alvarez Hidalgo
        ];

        DB::table('usuario_carrera')->insert($relaciones);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuario_carrera');
    }
};
