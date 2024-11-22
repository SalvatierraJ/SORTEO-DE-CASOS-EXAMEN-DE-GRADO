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
        Schema::table('tipo_tribunal', function (Blueprint $table) {
            $table->foreign(['id_tipoTitulo'], 'tipo_tribunal_ibfk_1')->references(['id_tipoTitulo'])->on('tipo_titulo')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['id_tribunal'], 'tipo_tribunal_ibfk_2')->references(['id_tribunal'])->on('tribunal')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tipo_tribunal', function (Blueprint $table) {
            $table->dropForeign('tipo_tribunal_ibfk_1');
            $table->dropForeign('tipo_tribunal_ibfk_2');
        });
    }
};
