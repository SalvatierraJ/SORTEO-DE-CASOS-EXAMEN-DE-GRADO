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
        Schema::table('usuario_carrera', function (Blueprint $table) {
            $table->foreign(['id_carrera'], 'usuario_carrera_ibfk_1')->references(['id_carrera'])->on('carrera')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['id_administrador'], 'usuario_carrera_ibfk_2')->references(['id_administrador'])->on('administrador')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('usuario_carrera', function (Blueprint $table) {
            $table->dropForeign('usuario_carrera_ibfk_1');
            $table->dropForeign('usuario_carrera_ibfk_2');
        });
    }
};
