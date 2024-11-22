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
        Schema::table('tribunal_defensa', function (Blueprint $table) {
            $table->foreign(['id_tribunal'], 'tribunal_defensa_ibfk_1')->references(['id_tribunal'])->on('tribunal')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['id_defensa'], 'tribunal_defensa_ibfk_2')->references(['id_defensa'])->on('defensa')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tribunal_defensa', function (Blueprint $table) {
            $table->dropForeign('tribunal_defensa_ibfk_1');
            $table->dropForeign('tribunal_defensa_ibfk_2');
        });
    }
};
