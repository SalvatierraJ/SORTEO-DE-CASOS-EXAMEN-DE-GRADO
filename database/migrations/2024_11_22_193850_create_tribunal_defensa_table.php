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
        Schema::create('tribunal_defensa', function (Blueprint $table) {
            $table->integer('id_tribunalDefensa', true);
            $table->integer('id_tribunal')->nullable()->index('id_tribunal');
            $table->integer('id_defensa')->nullable()->index('id_defensa');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tribunal_defensa');
    }
};
