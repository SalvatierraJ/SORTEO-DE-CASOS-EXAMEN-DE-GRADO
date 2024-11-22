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
        Schema::create('tipo_administrador', function (Blueprint $table) {
            $table->integer('id_tipoAdministrador', true);
            $table->integer('id_administrador')->nullable()->index('id_administrador');
            $table->integer('id_tipoTitulo')->nullable()->index('id_tipotitulo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipo_administrador');
    }
};
