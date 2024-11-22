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
            $table->date('fecha')->nullable();
            $table->enum('tipo_defensa', ['Defensa interna', 'Defensa externa'])->nullable()->default('Defensa interna');
            $table->decimal('nota', 5)->nullable();
            $table->integer('id_casoEstudio')->nullable()->index('id_casoestudio');
            $table->integer('id_estudiante')->nullable()->index('id_estudiante');
            $table->integer('id_administrador')->nullable()->index('id_administrador');
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
