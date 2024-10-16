<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('area_carrera', function (Blueprint $table) {
            $table->foreign(['id_carrera'], 'area_carrera_ibfk_1')->references(['id_carrera'])->on('carrera')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['id_caso'], 'area_carrera_ibfk_2')->references(['id_casoEstudio'])->on('casoestudio')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('area_carrera', function (Blueprint $table) {
            $table->dropForeign('area_carrera_ibfk_1');
            $table->dropForeign('area_carrera_ibfk_2');
        });
    }
};
