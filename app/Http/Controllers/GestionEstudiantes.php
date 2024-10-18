<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GestionEstudiantes extends Controller
{
    public function index() {
        return view('gestiondeestudiantes');
    }
}