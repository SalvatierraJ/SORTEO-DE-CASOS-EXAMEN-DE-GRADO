<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\casos;



Route::prefix('/')->group(function(){
    Route::get('/',[AuthController::class,'login'])->name('login');
    Route::post('/verificar',[AuthController::class,'loginVerificar'])->name('login.verificar');
    Route::get('/logout',[AuthController::class,'cerrarSesion'])->name('logOut');
});


Route::middleware('auth')->group(function(){
    Route::get('dashboard',function(){
        return view('layouts.menuPrincipal');
    })->name('dashboard');
}); 

Route::get('sorteo_de_casos',[casos::class,"index"]);
