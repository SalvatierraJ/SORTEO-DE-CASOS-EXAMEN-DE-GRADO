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
        Schema::table('usuario', function (Blueprint $table) {
            $table->foreign(['id_carrera'], 'usuario_ibfk_2')->references(['id_carrera'])->on('carrera')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['id_persona'], 'usuario_ibfk_3')->references(['id_persona'])->on('persona')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('usuario', function (Blueprint $table) {
            $table->dropForeign('usuario_ibfk_2');
            $table->dropForeign('usuario_ibfk_3');
        });
    }
};
