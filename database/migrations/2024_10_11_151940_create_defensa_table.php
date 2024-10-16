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
        Schema::create('defensa', function (Blueprint $table) {
            $table->integer('id_defensa', true);
            $table->integer('id_casoEstudio')->nullable()->index('id_casoestudio');
            $table->integer('id_usuario')->nullable()->index('id_usuario');
            $table->integer('id_jurado')->nullable()->index('id_jurado');
            $table->integer('id_estudiante')->nullable()->unique('id_estudiante');
            $table->dateTime('fecha_defensa')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('defensa');
    }
};
