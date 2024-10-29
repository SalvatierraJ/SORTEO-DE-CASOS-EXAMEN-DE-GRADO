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
        Schema::table('casos_de_estudio', function (Blueprint $table) {
            $table->foreign(['id_area'], 'casos_de_estudio_ibfk_1')->references(['id_area'])->on('area')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('casos_de_estudio', function (Blueprint $table) {
            $table->dropForeign('casos_de_estudio_ibfk_1');
        });
    }
};
