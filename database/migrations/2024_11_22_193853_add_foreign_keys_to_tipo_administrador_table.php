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
        Schema::table('tipo_administrador', function (Blueprint $table) {
            $table->foreign(['id_tipoTitulo'], 'tipo_administrador_ibfk_1')->references(['id_tipoTitulo'])->on('tipo_titulo')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['id_administrador'], 'tipo_administrador_ibfk_2')->references(['id_administrador'])->on('administrador')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tipo_administrador', function (Blueprint $table) {
            $table->dropForeign('tipo_administrador_ibfk_1');
            $table->dropForeign('tipo_administrador_ibfk_2');
        });
    }
};
