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
        Schema::create('bitacora_caso', function (Blueprint $table) {
            $table->integer('id_bitacora', true);
            $table->string('descripcion', 50)->nullable();
            $table->date('fecha')->nullable();
            $table->time('hora')->nullable();
            $table->integer('id_casoEstudio')->nullable()->index('id_casoestudio');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bitacora_caso');
    }
};
