<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared("CREATE DEFINER=`root`@`localhost` PROCEDURE `obtenerTotalDefensasNoProgramadas`()
BEGIN
    SELECT 
        COUNT(e.id_estudiante) AS total_defensas_no_programadas
    FROM 
        estudiante e
    LEFT JOIN 
        defensa d_interna ON e.id_estudiante = d_interna.id_estudiante AND d_interna.tipo_defensa = 'interna'
    LEFT JOIN 
        defensa d_externa ON e.id_estudiante = d_externa.id_estudiante AND d_externa.tipo_defensa = 'externa'
    WHERE 
        (
            -- Si la defensa interna no está aprobada o el intento es menor a 1
            (e.intentos_interna < 1 OR (d_interna.nota < 51 AND e.intentos_interna = 1))
        ) 
        OR 
        (
            -- Si la defensa externa no está aprobada o el intento es menor a 1
            (e.intentos_externa < 1 OR (d_externa.nota < 51 AND e.intentos_externa = 1))
        );
END");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared("DROP PROCEDURE IF EXISTS obtenerTotalDefensasNoProgramadas");
    }
};
