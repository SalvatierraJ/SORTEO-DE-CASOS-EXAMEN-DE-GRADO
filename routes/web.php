<?php
use App\Http\Controllers\GestionEstudiantes;
use App\Http\Controllers\Vista;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.menuPrincipal');
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::get('/Gestiones', [GestionEstudiantes::class, 'index']);