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
        Schema::create('usuario_carrera', function (Blueprint $table) {
            $table->integer('id_usuarioCarrera', true);
            $table->integer('id_carrera')->nullable()->index('id_carrera');
            $table->integer('id_administrador')->nullable()->index('id_administrador');
            $table->string('estado', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuario_carrera');
    }
};
