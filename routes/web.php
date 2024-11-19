<?php
use App\Http\Controllers\GestionEstudianteController;
use App\Http\Controllers\Vista;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\casos;
use App\Http\Controllers\MenuPrincipalController;
use App\Http\Controllers\vistaJuradosController;
use PhpOffice\PhpSpreadsheet\Worksheet\Row;

Route::prefix('/')->group(function(){
    Route::get('/',[AuthController::class,'login'])->name('login');
    Route::post('/verificar',[AuthController::class,'loginVerificar'])->name('login.verificar');
    Route::get('/logout',[AuthController::class,'cerrarSesion'])->name('logOut');
});

Route::prefix('/gestion-de-estudiantes')->group(function() {
    Route::get('/', [GestionEstudianteController::class, 'vistaEstudiante']);
    Route::post('/registrarEstudiante',[GestionEstudianteController::class,'cargarEstudiantes'])->name('registrar.Estudiante');
});


Route::prefix('/jurados')->group( function(){
    Route::get('/',[vistaJuradosController::class,'vistaJurado'])->name('vistaJurado');
    Route::post('/registrarJurado',[vistaJuradosController::class,'cargarJurado'])->name('guardarJurado');
    Route::get('/buscarTribunal/{id}', [vistaJuradosController::class, 'buscarTribunal'])->name('buscar.Tribunal');
    Route::post('/editarTribunal', [vistaJuradosController::class, 'editarTribunal'])->name('editar.Tribunal');

});


Route::middleware('auth')->group(function(){
    Route::get('/dashboard',[MenuPrincipalController::class,'index'])->name('dashboard');
}); 

Route::get('/crear-usuario-admin', [AuthController::class, 'crearUsuarioAdmin']);
Route::get('sorteo_de_casos',[casos::class,"index"]);

Route::get('/sorteo', function () {
    return view('layouts.sorteo'); 
});



// Archivo: routes/web.php
Route::get('/inicio', function () {
    return view('layouts.inicio');
});

// Archivo: routes/web.php
Route::get('/evaluaciones', function () {
    return view('layouts.evaluaciones');
});


Route::get('/gestion-de-casos', function () {
    return view('layouts.gestionDeCasos');
});






