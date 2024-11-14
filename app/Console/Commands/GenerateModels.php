<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class GenerateModels extends Command
{
    
    protected $signature = 'generate:models';
    protected $description = 'Genera modelos para todas las tablas de la base de datos';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Obtener todas las tablas de la base de datos
        $tables = DB::select('SHOW TABLES');
        $dbName = env('DB_DATABASE');
        $key = "Tables_in_$dbName";

        foreach ($tables as $table) {
            $tableName = $table->$key;

            // Generar un nombre de modelo en base al nombre de la tabla
            $modelName = Str::studly(Str::singular($tableName));

            // Crear el modelo si no existe
            $path = app_path("Models/{$modelName}.php");
            if (!file_exists($path)) {
                $this->call('make:model', ['name' => "Models/{$modelName}"]);
                $this->info("Modelo {$modelName} creado para la tabla {$tableName}");
            } else {
                $this->info("Modelo {$modelName} ya existe.");
            }
        }

        $this->info('Modelos generados para todas las tablas.');
    }
}
