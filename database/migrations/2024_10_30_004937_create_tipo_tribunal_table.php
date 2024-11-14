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
        Schema::create('tipo_tribunal', function (Blueprint $table) {
            $table->integer('id_tipoTribunal', true);
            $table->integer('id_tipoTitulo')->nullable()->index('id_tipotitulo');
            $table->integer('id_tribunal')->nullable()->index('id_tribunal');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipo_tribunal');
    }
};
