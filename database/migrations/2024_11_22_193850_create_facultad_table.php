<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('facultad', function (Blueprint $table) {
            $table->integer('id_facultad', true);
            $table->string('nombre_facultad', 100);
        });
        DB::table('facultad')->insert([
            ['id_facultad' => 1, 'nombre_facultad' => 'Ciencias y Tecnologia'],
            ['id_facultad' => 2, 'nombre_facultad' => 'Ciencias Empresariales'],
            ['id_facultad' => 3, 'nombre_facultad' => 'Ciencias Juridicas, Sociales y Humanisticas'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facultad');
    }
};
