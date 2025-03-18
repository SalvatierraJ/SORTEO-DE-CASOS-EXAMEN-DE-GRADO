<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Models\Area;
use App\Models\Models\CasosDeEstudio;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class gestionDeCasosController extends Controller
{
    public function vistaGestionCasos()
    {
        if (Auth::check()) {
            $idAdministrador = Auth::user()->id_administrador;
            $areas = Area::whereHas('carrera', function ($query) use ($idAdministrador) {
                $query->whereHas('usuariosCarrera', function ($subQuery) use ($idAdministrador) {
                    $subQuery->where('id_administrador', $idAdministrador);
                });
            })->get();
        }
        $casos = CasosDeEstudio::with('area')
            ->select('id_casoEstudio', 'descripcion_caso', 'estado', 'id_area')
            ->get();



        return view('layouts.gestionDeCasos', compact('areas', 'casos'));
    }
    public function agregarCaso(Request $request)
    {

        $request->validate([
            'casoEstudioArchivo' => 'required|array',
            'casoEstudioArchivo.*' => 'file|mimes:pdf,docx|max:10240',
            'categoria' => 'nullable|integer|not_in:0',
        ], [
            'casoEstudioArchivo.required' => 'Por favor, sube al menos un archivo para el caso de estudio.',
            'casoEstudioArchivo.array' => 'El campo de archivos debe ser un array.',
            'casoEstudioArchivo.*.file' => 'Cada archivo debe ser válido.',
            'casoEstudioArchivo.*.mimes' => 'Cada archivo debe ser de tipo: pdf o docx.',
            'casoEstudioArchivo.*.max' => 'Cada archivo no debe superar los 2 MB.',
            'categoria.integer' => 'Seleccione una categoría.',
            'categoria.not_in' => 'Por favor, elige una categoría.',
        ]);


        if ($request->hasFile('casoEstudioArchivo')) {
            foreach ($request->file('casoEstudioArchivo') as $archivo) {
                $nombreOriginal = $archivo->getClientOriginalName();
                $nombreSinExtension = pathinfo($nombreOriginal, PATHINFO_FILENAME);


                $path = $archivo->store('private');
                $nombreArchivo = basename($path);

                // Crear el registro en la base de datos
                CasosDeEstudio::create([
                    'descripcion_caso' => $nombreSinExtension,
                    'id_area' => $request->categoria,
                    'nombre_archivo' => $nombreArchivo,
                ]);
            }

            session()->flash('success', 'Los casos se registraron con éxito');
        } else {
            // Si no hay archivos, mostrar mensaje de error
            session()->flash('error', 'No se subió ningún archivo.');
        }

        return redirect()->back();
    }

    public function buscarCaso($id){
        $caso = CasosDeEstudio::with('area')
            ->select('id_casoEstudio', 'descripcion_caso', 'estado', 'id_area')
            ->where('id_casoEstudio', $id)
            ->first();
        return response()->json($caso);
    }


    public function borrarArchivo($id)
    {
        $tribunal = CasosDeEstudio::find($id);
        if (!$tribunal) {
            return response()->json(['mensaje' => 'Archivo no encontrado'], 404);
        }
        $nombreArchivo = $tribunal->nombre_archivo;
        $ruta = "private/$nombreArchivo";


        if (Storage::exists($ruta)) {
            Storage::delete($ruta);
        }


        session()->flash('success', 'Caso eliminado Exitosamente');
        return redirect()->back();
    }
}
