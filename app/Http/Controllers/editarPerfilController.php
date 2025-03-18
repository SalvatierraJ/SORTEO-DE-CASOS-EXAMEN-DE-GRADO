<?php

namespace App\Http\Controllers;

use App\Models\Models\Carrera;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class editarPerfilController extends Controller
{
    public function vistaEditarPerfil(){
        if (Auth::check()) {
            $idAdministrador = Auth::user()->id_administrador;
            $carreras = Carrera::whereHas('usuariosCarrera', function ($query) use ($idAdministrador) {
                $query->where('id_administrador', $idAdministrador);
            })->get();
        }

        return view('layouts.editarPerfil',compact('carreras'));
    }
}
