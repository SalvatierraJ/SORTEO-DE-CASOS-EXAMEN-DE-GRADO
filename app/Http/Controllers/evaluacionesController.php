<?php

namespace App\Http\Controllers;

use App\Models\Models\Defensa;
use App\Models\Models\Estudiante;
use App\Models\Models\Tribunal;
use App\Models\Models\TribunalDefensa;
use Illuminate\Http\Request;

class evaluacionesController extends Controller
{
    public function vistaEvaluaciones()
    {
        $tribunalesActivos = Tribunal::where('estado', 'Activo')->get();
        $defensa = Defensa::with(['estudiante', 'tribunaldefensa'])
            ->select(
                'id_defensa',
                'fecha',
                'tipo_defensa',
                'nota',
                'id_casoEstudio',
                'id_estudiante',
                'id_administrador'
            )
            ->get()
            ->map(function ($defensa) {

                $nombreCompleto = "{$defensa->estudiante->nombre},{$defensa->estudiante->apellido}";


                $nota = !empty($defensa->nota) ? $defensa->nota : null;

                $tribunal = isset($defensa->tribunaldefensa) ? $defensa->tribunaldefensa->count() : 0;

                return [
                    'id_defensa' => $defensa->id_defensa,
                    'registro' => $defensa->estudiante->nroRegistro,
                    'nombre_completo' => $nombreCompleto,
                    'fecha' => $defensa->fecha,
                    'tipo' => $defensa->tipo_defensa,
                    'nota' => $nota,
                    'tribunal' => $tribunal
                ];
            });


        return view('layouts.evaluaciones', compact('defensa', 'tribunalesActivos'));
    }

    public function subirNota(Request $request)
    {
        $defensa = Defensa::find($request->id);
        $defensa->nota = $request->nota;
        $defensa->save();
        return redirect()->back()->with('success', 'Nota Actualizada exitosamente');
    }

    public function juradosAsignados($id)
    {
        $defensa = Defensa::with('tribunaldefensa')->findOrFail($id);

        return response()->json($defensa);
    }

    public function asignarJurado(Request $request)
    {

        $defensas = $request->defensas;
        $tribunales = $request->tribunales;


        $defensas = array_filter($defensas);




        if (!is_array($defensas) || count($defensas) < 1) {

            return redirect()->back()->with('error', 'Debes seleccionar al menos una defensa.');
        }

        foreach ($defensas as $defensa) {
            foreach ($tribunales as $tribunal) {
                TribunalDefensa::create([
                    'id_tribunal' => $tribunal,
                    'id_defensa' => $defensa
                ]);
            }
        }

        return redirect()->back()->with('success', 'Se cargaron los tribunales');
    }

    public function buscarDefensa(Request $request)
    {
        $texto = trim($request->q);

        $resultado = Defensa::with(['estudiante', 'tribunaldefensa'])
            ->where(function ($query) use ($texto) {
                // Búsqueda por nombre, apellido, nombre completo, o nroRegistro
                $query->whereHas('estudiante', function ($q) use ($texto) {
                    $q->where('nombre', 'like', "%$texto%")
                        ->orWhere('apellido', 'like', "%$texto%")
                        ->orWhereRaw("CONCAT(nombre, ' ', apellido) LIKE ?", ["%$texto%"])
                        ->orWhereRaw("CONCAT(apellido, ' ', nombre) LIKE ?", ["%$texto%"])
                        ->orWhere('nroRegistro', 'like', "%$texto%");
                });
            })
            ->select(
                'id_defensa',
                'fecha',
                'tipo_defensa',
                'nota',
                'id_casoEstudio',
                'id_estudiante',
                'id_administrador'
            )
            ->orderBy('id_defensa', 'desc')
            ->get()
            ->map(function ($defensa) {
                $nombreCompleto = "{$defensa->estudiante->nombre}, {$defensa->estudiante->apellido}";

                $nota = !empty($defensa->nota) ? $defensa->nota : null;

                $tribunal = isset($defensa->tribunaldefensa) ? $defensa->tribunaldefensa->count() : 0;

                return [
                    'id_defensa' => $defensa->id_defensa,
                    'registro' => $defensa->estudiante->nroRegistro,
                    'nombre_completo' => $nombreCompleto,
                    'fecha' => $defensa->fecha,
                    'tipo' => $defensa->tipo_defensa,
                    'nota' => $nota,
                    'tribunal' => $tribunal
                ];
            })
            ->values();

        return response()->json($resultado);
    }
}
