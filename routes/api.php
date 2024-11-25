<?php

use App\Http\Controllers\sorteoCasosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('estudiantes/buscar',[sorteoCasosController::class,'buscarEstudiante']);
Route::get('casos/buscar',[sorteoCasosController::class,'buscarCasosPorArea']);
