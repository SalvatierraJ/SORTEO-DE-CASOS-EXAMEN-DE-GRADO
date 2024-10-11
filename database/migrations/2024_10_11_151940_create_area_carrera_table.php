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
        Schema::create('area_carrera', function (Blueprint $table) {
            $table->integer('id_area', true);
            $table->integer('id_carrera')->nullable()->index('id_carrera');
            $table->integer('id_caso')->nullable()->index('id_caso');
            $table->string('nombre_area', 30)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('area_carrera');
    }
};
