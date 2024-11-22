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
        DB::unprepared("CREATE DEFINER=`root`@`localhost` PROCEDURE `obtenerTotalDefensasProgramadasMesActual`()
BEGIN
    SELECT 
        COUNT(*) AS total_defensas_programadas_mes_actual
    FROM 
        defensa
    WHERE 
        MONTH(fecha) = MONTH(CURDATE()) AND
        YEAR(fecha) = YEAR(CURDATE());
END");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared("DROP PROCEDURE IF EXISTS obtenerTotalDefensasProgramadasMesActual");
    }
};
