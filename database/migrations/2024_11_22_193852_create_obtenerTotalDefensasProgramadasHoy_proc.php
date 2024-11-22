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
        DB::unprepared("CREATE DEFINER=`root`@`localhost` PROCEDURE `obtenerTotalDefensasProgramadasHoy`()
BEGIN
    SELECT 
        COUNT(*) AS total_defensas_programadas_hoy
    FROM 
        defensa
    WHERE 
        DAYOFWEEK(fecha) = DAYOFWEEK(CURDATE());
END");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared("DROP PROCEDURE IF EXISTS obtenerTotalDefensasProgramadasHoy");
    }
};
