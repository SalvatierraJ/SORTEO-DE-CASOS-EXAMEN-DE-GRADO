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
        Schema::create('carrera', function (Blueprint $table) {
            $table->integer('id_carrera', true);
            $table->string('nombre_carrera', 100);
            $table->integer('id_facultad')->nullable()->index('id_facultad');
        });
        DB::table('carrera')->insert([
            // Ciencias y Tecnología
            ['nombre_carrera' => 'Ingenieria de Sistemas', 'id_facultad' => 1],
            ['nombre_carrera' => 'Ingenieria en Redes y Telecomunicaciones', 'id_facultad' => 1],
            ['nombre_carrera' => 'Ingenieria Industrial y Comercial', 'id_facultad' => 1],
            ['nombre_carrera' => 'Ingenieria Mecanica Automotriz y Agroindustrial', 'id_facultad' => 1],
            ['nombre_carrera' => 'Ingenieria Electronica y Sistemas', 'id_facultad' => 1],
            ['nombre_carrera' => 'Ingenieria en Administración Petrolera', 'id_facultad' => 1],
            ['nombre_carrera' => 'Ingenieria Electrica', 'id_facultad' => 1],

            // Ciencias Empresariales
            ['nombre_carrera' => 'Administracion de Turismo', 'id_facultad' => 2],
            ['nombre_carrera' => 'Administracion Financiera/ Ingenieria Financiera', 'id_facultad' => 2],
            ['nombre_carrera' => 'Administracion General', 'id_facultad' => 2],
            ['nombre_carrera' => 'Auditoria Financiera /Contaduria Publica', 'id_facultad' => 2],
            ['nombre_carrera' => 'Comercio Internacional', 'id_facultad' => 2],
            ['nombre_carrera' => 'Comunicacion Estrategica y Digital', 'id_facultad' => 2],
            ['nombre_carrera' => 'Ingenieria Comercial', 'id_facultad' => 2],
            ['nombre_carrera' => 'Ingenieria en Marketing y Publicidad', 'id_facultad' => 2],

            // Ciencias Jurídicas, Sociales y Humanísticas
            ['nombre_carrera' => 'Relaciones Internacionales', 'id_facultad' => 3],
            ['nombre_carrera' => 'Derecho', 'id_facultad' => 3],
            ['nombre_carrera' => 'Psicologia', 'id_facultad' => 3],
        ]);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carrera');
    }
};
