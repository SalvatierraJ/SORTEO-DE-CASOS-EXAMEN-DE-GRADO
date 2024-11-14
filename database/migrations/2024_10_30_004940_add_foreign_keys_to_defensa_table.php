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
        Schema::table('defensa', function (Blueprint $table) {
            $table->foreign(['id_casoEstudio'], 'defensa_ibfk_1')->references(['id_casoEstudio'])->on('casos_de_estudio')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['id_estudiante'], 'defensa_ibfk_2')->references(['id_estudiante'])->on('estudiante')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['id_administrador'], 'defensa_ibfk_3')->references(['id_administrador'])->on('administrador')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('defensa', function (Blueprint $table) {
            $table->dropForeign('defensa_ibfk_1');
            $table->dropForeign('defensa_ibfk_2');
            $table->dropForeign('defensa_ibfk_3');
        });
    }
};
