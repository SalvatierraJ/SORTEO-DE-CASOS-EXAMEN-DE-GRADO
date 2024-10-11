<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;


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
