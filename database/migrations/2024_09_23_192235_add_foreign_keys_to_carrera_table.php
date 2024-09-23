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
        Schema::table('carrera', function (Blueprint $table) {
            $table->foreign(['id_facultad'], 'carrera_ibfk_1')->references(['id_facultad'])->on('facultad')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('carrera', function (Blueprint $table) {
            $table->dropForeign('carrera_ibfk_1');
        });
    }
};
