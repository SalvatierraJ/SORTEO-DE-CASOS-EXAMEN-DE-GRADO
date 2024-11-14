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
        Schema::create('estudiante', function (Blueprint $table) {
            $table->integer('id_estudiante', true);
            $table->string('nombre', 100)->nullable();
            $table->string('apellido', 100)->nullable();
            $table->string('telefono', 15)->nullable();
            $table->string('correo', 100)->nullable();
            $table->string('estado_defensa_interna', 50)->nullable();
            $table->integer('intentos_interna')->nullable();
            $table->string('estado_defensa_externa', 50)->nullable();
            $table->integer('intentos_externa')->nullable();
            $table->integer('id_carrera')->nullable()->index('id_carrera');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estudiante');
    }
};
