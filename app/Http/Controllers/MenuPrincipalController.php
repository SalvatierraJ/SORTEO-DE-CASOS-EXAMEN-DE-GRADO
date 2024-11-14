<?php

namespace App\Http\Controllers;

use App\Models\menuPrincipalmodel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class MenuPrincipalController extends Controller
{

    public function index()
    {
        if (Auth::check()) {
            $nombreUsuario = Auth::user()->nombre;
        } else {
            $nombreUsuario = null;
        }

        $modelo = new menuPrincipalmodel();
        $defensasCompletadas = $modelo->obtenerTotalDefensasCompletadas();
        $totalDC=$defensasCompletadas[0]->total_defensas_completadas ?? 0;
        $defensasProgramadas = $modelo->obtenerTotalDefensasProgramadasMesActual();
        $totalDP=$defensasProgramadas[0]->total_defensas_programadas_mes_actual ?? 0;
        $defensasNOProgramadas = $modelo->obtenerTotalDefensasNoProgramadas();
        $totalDNP = $defensasNOProgramadas[0]->total_defensas_no_programadas ?? 0;
        $defensasProgramadasHoy = $modelo->obtenerDefensasProgramadasHoy();
        $totalDPH = $defensasProgramadasHoy[0]->total_defensas_programadas_hoy ?? 0;

        return view('layouts.menuPrincipal', compact(
            'nombreUsuario',
            'totalDC',
            'totalDP',
            'totalDNP',
            'totalDPH'
        ));
    }
}
