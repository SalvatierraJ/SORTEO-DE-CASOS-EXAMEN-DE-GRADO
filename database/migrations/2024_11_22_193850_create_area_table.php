<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('area', function (Blueprint $table) {
            $table->integer('id_area', true);
            $table->string('nombre_area', 100);
            $table->integer('id_carrera')->nullable()->index('id_carrera');
        });
        DB::table('area')->insert([
            // Ingeniería de Sistemas
            ['nombre_area' => 'Sistemas de Información & Base de Datos', 'id_carrera' => 1],
            ['nombre_area' => 'Ingeniería en Software', 'id_carrera' => 1],
            ['nombre_area' => 'Infraestructura', 'id_carrera' => 1],

            // Ingeniería en Redes y Telecomunicaciones
            ['nombre_area' => 'Diseño de Redes', 'id_carrera' => 2],
            ['nombre_area' => 'Telecomunicaciones', 'id_carrera' => 2],
            ['nombre_area' => 'Gestión y seguridad de Redes', 'id_carrera' => 2],

            // Ingeniería Industrial y Comercial
            ['nombre_area' => 'Apoyo Tecnológico', 'id_carrera' => 3],
            ['nombre_area' => 'Procesos Industriales', 'id_carrera' => 3],
            ['nombre_area' => 'Producción', 'id_carrera' => 3],
            ['nombre_area' => 'Evaluación de Proyectos', 'id_carrera' => 3],

            // Ingeniería Mecánica Automotriz y Agroindustrial
            ['nombre_area' => 'Mecánica Automotriz', 'id_carrera' => 4],
            ['nombre_area' => 'Mecánica Industrial', 'id_carrera' => 4],
            ['nombre_area' => 'Mecánica Agroindustrial', 'id_carrera' => 4],

            // Ingeniería Electrónica y Sistemas
            ['nombre_area' => 'Automatización Industrial', 'id_carrera' => 5],
            ['nombre_area' => 'Sistemas de Control', 'id_carrera' => 5],
            ['nombre_area' => 'Electricidad Industrial', 'id_carrera' => 5],
            ['nombre_area' => 'Sistemas Digitales', 'id_carrera' => 5],

            // Ingeniería en Administración Petrolera
            ['nombre_area' => 'Gestión Petrolera', 'id_carrera' => 6],
            ['nombre_area' => 'Evaluación Financiera', 'id_carrera' => 6],
            ['nombre_area' => 'Apoyo Tecnológico', 'id_carrera' => 6],

            // Ingeniería Eléctrica
            ['nombre_area' => 'Sistemas eléctricos de potencia', 'id_carrera' => 7],
            ['nombre_area' => 'Energías Alternativas', 'id_carrera' => 7],
            ['nombre_area' => 'Máquinas eléctricas para la industria', 'id_carrera' => 7],

            // Administración de Turismo
            ['nombre_area' => 'Gerencia Contemporánea', 'id_carrera' => 8],
            ['nombre_area' => 'Empresas prestadoras de servicios turísticos', 'id_carrera' => 8],
            ['nombre_area' => 'Gestión y desarrollo de la actividad turística', 'id_carrera' => 8],

            // Administración Financiera / Ingeniería Financiera
            ['nombre_area' => 'Finanzas a corto plazo', 'id_carrera' => 9],
            ['nombre_area' => 'Costo de Capital', 'id_carrera' => 9],
            ['nombre_area' => 'Decisiones Financieras de Inversión', 'id_carrera' => 9],
            ['nombre_area' => 'Modelación Financiera', 'id_carrera' => 9],

            // Administración General
            ['nombre_area' => 'Gerencia Contemporánea', 'id_carrera' => 10],
            ['nombre_area' => 'Gestión del Talento Humano', 'id_carrera' => 10],
            ['nombre_area' => 'Dirección Estratégica', 'id_carrera' => 10],
            ['nombre_area' => 'Decisiones Financieras de Inversiones', 'id_carrera' => 10],
            ['nombre_area' => 'Desarrollo de Negocios', 'id_carrera' => 10],

            // Auditoría Financiera / Contaduría Pública
            ['nombre_area' => 'Auditoría', 'id_carrera' => 11],
            ['nombre_area' => 'Contabilidad Básica', 'id_carrera' => 11],
            ['nombre_area' => 'Administración Financiera', 'id_carrera' => 11],
            ['nombre_area' => 'Costos', 'id_carrera' => 11],

            // Comercio Internacional
            ['nombre_area' => 'Fundamentos del Comercio Internacional', 'id_carrera' => 12],
            ['nombre_area' => 'Gestión Aduanera', 'id_carrera' => 12],
            ['nombre_area' => 'Logística y DFI', 'id_carrera' => 12],
            ['nombre_area' => 'Internacionalización de la Empresa', 'id_carrera' => 12],

            // Comunicación Estratégica y Digital
            ['nombre_area' => 'Fundamentos de Comunicación', 'id_carrera' => 13],
            ['nombre_area' => 'Periodismo Corporativo y Digital', 'id_carrera' => 13],
            ['nombre_area' => 'Producción Audiovisual', 'id_carrera' => 13],
            ['nombre_area' => 'Marketing Especializado', 'id_carrera' => 13],
            ['nombre_area' => 'Comunicación Estratégica y Digital', 'id_carrera' => 13],

            // Ingeniería Comercial
            ['nombre_area' => 'Dirección Estratégica', 'id_carrera' => 14],
            ['nombre_area' => 'Marketing Estratégico e Innovación', 'id_carrera' => 14],
            ['nombre_area' => 'Investigación y Análisis de Mercado Empresarial', 'id_carrera' => 14],
            ['nombre_area' => 'Gestión Comercial', 'id_carrera' => 14],
            ['nombre_area' => 'Gestión Emprendedora', 'id_carrera' => 14],

            // Ingeniería en Marketing y Publicidad
            ['nombre_area' => 'Investigación de Mercado', 'id_carrera' => 15],
            ['nombre_area' => 'Marketing Estratégico e Innovación', 'id_carrera' => 15],
            ['nombre_area' => 'Marketing Operativo', 'id_carrera' => 15],
            ['nombre_area' => 'Marketing Especializado', 'id_carrera' => 15],
            ['nombre_area' => 'Publicidad', 'id_carrera' => 15],

            // Relaciones Internacionales
            ['nombre_area' => 'Integración y cooperación internacional', 'id_carrera' => 16],
            ['nombre_area' => 'Resolución de Conflictos', 'id_carrera' => 16],
            ['nombre_area' => 'Diplomacia y política internacional', 'id_carrera' => 16],
            ['nombre_area' => 'Internacionalización de la Empresa', 'id_carrera' => 16],

            // Derecho
            ['nombre_area' => 'Penal', 'id_carrera' => 17],
            ['nombre_area' => 'Constitucional', 'id_carrera' => 17],
            ['nombre_area' => 'Comercial', 'id_carrera' => 17],
            ['nombre_area' => 'Civil', 'id_carrera' => 17],

            // Psicología
            ['nombre_area' => 'Psicología Clínica', 'id_carrera' => 18],
            ['nombre_area' => 'Psicología Organizacional', 'id_carrera' => 18],
            ['nombre_area' => 'Psicología Educativa', 'id_carrera' => 18],
            ['nombre_area' => 'Psicología Forense', 'id_carrera' => 18],
            ['nombre_area' => 'Psicología Comunitaria', 'id_carrera' => 18],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('area');
    }
};
