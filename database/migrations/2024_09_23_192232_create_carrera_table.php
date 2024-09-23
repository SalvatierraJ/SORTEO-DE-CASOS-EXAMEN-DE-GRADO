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
        Schema::create('carrera', function (Blueprint $table) {
            $table->integer('id_carrera', true);
            $table->string('nombre_carrera', 30);
            $table->integer('id_facultad')->nullable()->index('id_facultad');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carrera');
    }
};
