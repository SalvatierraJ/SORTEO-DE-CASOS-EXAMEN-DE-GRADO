<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\casos;


Route::get('/', function () {
    return view('layouts.menuPrincipal');
});

/*Route::middleware([
    'auth:sanctum',[
])->group( function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
}); */

Route::get('sorteo_de_casos',[casos::class,"index"]);
