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
            $table->integer('nroRegistro')->nullable();
            $table->string('nombre', 100)->nullable();
            $table->string('apellido', 100)->nullable();
            $table->string('telefono', 15)->nullable();
            $table->string('correo', 100)->nullable();
            $table->enum('estado_defensa_interna', ['Pendiente', 'Aprobado'])->nullable()->default('Pendiente');
            $table->integer('intentos_interna')->nullable()->default(0);
            $table->enum('estado_defensa_externa', ['Pendiente', 'Aprobado'])->nullable()->default('Pendiente');
            $table->integer('intentos_externa')->nullable()->default(0);
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
