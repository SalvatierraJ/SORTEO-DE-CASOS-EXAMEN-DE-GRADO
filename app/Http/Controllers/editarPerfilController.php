<?php

namespace App\Http\Controllers;

use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;

class editarPerfilController extends Controller
{
    public function vistaEditarPerfil(){
       
        return view('layouts.editarPerfil');
    }
}
