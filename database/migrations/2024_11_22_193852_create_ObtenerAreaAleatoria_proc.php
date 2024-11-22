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
        DB::unprepared("CREATE DEFINER=`root`@`localhost` PROCEDURE `ObtenerAreaAleatoria`()
BEGIN
    -- Selección aleatoria de un área
    SELECT id_area, nombre_area
    FROM area
    ORDER BY RAND()  -- Selección aleatoria
    LIMIT 1;
END");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared("DROP PROCEDURE IF EXISTS ObtenerAreaAleatoria");
    }
};
