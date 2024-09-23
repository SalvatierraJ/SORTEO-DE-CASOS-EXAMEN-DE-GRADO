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
        Schema::create('persona', function (Blueprint $table) {
            $table->integer('id_persona', true);
            $table->integer('registro')->unique('registro');
            $table->string('nombre', 30);
            $table->string('apellido', 30);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('persona');
    }
};
