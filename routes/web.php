<?php
use App\Http\Controllers\GestionEstudianteController;
use App\Http\Controllers\Vista;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\casos;
use App\Http\Controllers\editarPerfilController;
use App\Http\Controllers\evaluacionesController;
use App\Http\Controllers\gestionDeCasosController;
use App\Http\Controllers\MenuPrincipalController;
use App\Http\Controllers\sorteoCasosController;
use App\Http\Controllers\vistaJuradosController;
use PhpOffice\PhpSpreadsheet\Worksheet\Row;

Route::prefix('/')->group(function(){
    Route::get('/',[AuthController::class,'login'])->name('login');
    Route::post('/verificar',[AuthController::class,'loginVerificar'])->name('login.verificar');
    Route::get('/logout',[AuthController::class,'cerrarSesion'])->name('logOut');
});



Route::middleware('auth')->group(function(){
    Route::get('/dashboard',[MenuPrincipalController::class,'index'])->name('dashboard');

    Route::prefix('/gestion-de-estudiantes')->group(function() {
        Route::get('/', [GestionEstudianteController::class, 'vistaEstudiante'])->name('gestion.estudiante');
        Route::post('/registrarEstudiante',[GestionEstudianteController::class,'cargarEstudiantes'])->name('registrar.Estudiante');
        Route::post('/editarEstuidate',[GestionEstudianteController::class,'editarEstuidante'])->name('editar.estuidante');
    });


    Route::prefix('/jurados')->group( function(){
        Route::get('/',[vistaJuradosController::class,'vistaJurado'])->name('vistaJurado');
        Route::post('/registrarJurado',[vistaJuradosController::class,'cargarJurado'])->name('guardarJurado');
        Route::get('/buscarTribunal/{id}', [vistaJuradosController::class, 'buscarTribunal'])->name('buscar.Tribunal');
        Route::post('/editarTribunal', [vistaJuradosController::class, 'editarTribunal'])->name('editar.Tribunal');

    });
    Route::prefix('/gestion-de-casos')->group(function(){
        Route::get('/',[gestionDeCasosController::class,'vistaGestionCasos']);
        Route::post('/agregarCaso',[gestionDeCasosController::class,'agregarCaso'])->name('agregar.caso');
        Route::delete('/borrarCaso/{id}', [gestionDeCasosController::class, 'borrarArchivo'])->name('borrar.caso');
        Route::get('/buscarCaso/{id}',[gestionDeCasosController::class,'buscarCaso'])->name('buscar.caso');

    });

    Route::prefix('/sorteo')->group(function(){
        Route::get('/',[sorteoCasosController::class,'vistaSorteo'])->name('vista.sorteo');
        Route::post('/crar-Defensa/{id}/{tipo_defensa}', [SorteoCasosController::class, 'crearDefensa'])->name('crear.Defesna');
        Route::get('/enviar-caso/{id}/{id_defensa}', [sorteoCasosController::class, 'enviarCaso'])->name('enviar.correo');
        Route::post('/editar-estado-caso/{id}/{estado}', [SorteoCasosController::class, 'editarEstadoCaso'])->name('editar.caso');

    });

    Route::prefix('/perfil')->group(function(){
        Route::get('/',[editarPerfilController::class,'vistaEditarPerfil'])->name('vista.Perfil');
    });

    Route::prefix('/evaluaciones')->group(function(){
        Route::get('/',[evaluacionesController::class,'vistaEvaluaciones'])->name('vista.evaluacion');
        Route::post('/editarNota',[evaluacionesController::class,'subirNota'])->name('subir.nota');
        Route::get('/juradosAsignados/{id}',[evaluacionesController::class,'juradosAsignados'])->name('jurado.asignado');
        Route::post('/asignarJurado',[evaluacionesController::class,'asignarJurado'])->name('asignar.jurado');
    });
});














