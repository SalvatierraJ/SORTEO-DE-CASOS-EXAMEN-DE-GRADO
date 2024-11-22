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
        Schema::table('bitacora_caso', function (Blueprint $table) {
            $table->foreign(['id_casoEstudio'], 'bitacora_caso_ibfk_1')->references(['id_casoEstudio'])->on('casos_de_estudio')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bitacora_caso', function (Blueprint $table) {
            $table->dropForeign('bitacora_caso_ibfk_1');
        });
    }
};
