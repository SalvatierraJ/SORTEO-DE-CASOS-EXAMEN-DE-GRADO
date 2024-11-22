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
        Schema::create('casos_de_estudio', function (Blueprint $table) {
            $table->integer('id_casoEstudio', true);
            $table->text('descripcion_caso')->nullable();
            $table->enum('estado', ['Activo', 'Inactivo'])->nullable()->default('Activo');
            $table->integer('id_area')->nullable()->index('id_area');
            $table->text('nombre_archivo')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('casos_de_estudio');
    }
};
