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
        DB::unprepared("CREATE DEFINER=`root`@`localhost` PROCEDURE `obtenerTotalDefensasCompletadas`()
BEGIN
    SELECT 
        COUNT(*) AS total_defensas_completadas
    FROM 
        defensa 
    WHERE 
        nota IS NOT NULL;
END");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared("DROP PROCEDURE IF EXISTS obtenerTotalDefensasCompletadas");
    }
};
