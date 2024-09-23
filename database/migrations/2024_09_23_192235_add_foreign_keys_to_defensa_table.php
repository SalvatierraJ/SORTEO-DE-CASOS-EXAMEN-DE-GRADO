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
            $table->foreign(['id_casoEstudio'], 'defensa_ibfk_1')->references(['id_casoEstudio'])->on('casoestudio')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['id_usuario'], 'defensa_ibfk_2')->references(['id_usuario'])->on('usuario')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['id_jurado'], 'defensa_ibfk_3')->references(['id_jurado'])->on('jurado')->onUpdate('restrict')->onDelete('restrict');
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
