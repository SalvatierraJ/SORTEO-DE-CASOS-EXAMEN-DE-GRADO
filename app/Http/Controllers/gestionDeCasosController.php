<?php

namespace App\Http\Controllers;

use App\Models\Models\Area;
use App\Models\Models\CasosDeEstudio;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class gestionDeCasosController extends Controller
{
    public function vistaGestionCasos()
    {
        $areas = Area::all();
        $casos = CasosDeEstudio::with('area') 
            ->select('id_casoEstudio','descripcion_caso', 'estado', 'id_area')
            ->take(10) 
            ->get();

       

        return view('layouts.gestionDeCasos', compact('areas','casos'));
    }

    public function agregarCaso(Request $request)
    {

        $request->validate([
            'casoEstudioArchivo' => 'required|file|mimes:jpg,png,pdf,docx|max:2048',
            'categoria' => 'nullable|integer|not_in:0',
        ], [
            'casoEstudioArchivo.required' => 'Por favor, sube un archivo para el caso de estudio.',
            'casoEstudioArchivo.file' => 'El archivo debe ser un archivo válido.',
            'casoEstudioArchivo.mimes' => 'El archivo debe ser de tipo: jpg, png, pdf o docx.',
            'casoEstudioArchivo.max' => 'El archivo no debe superar los 2 MB.',
            'categoria.integer' => 'Seleccione una Categoria',
            'categoria.not_in' => 'Por favor, elige una categoría.',
        ]);


        $nombreOriginal = $request->file('casoEstudioArchivo')->getClientOriginalName();
        $nombreSinExtension = pathinfo($nombreOriginal, PATHINFO_FILENAME);


        $path = $request->file('casoEstudioArchivo')->store('private');
        $nombreArchivo = basename($path);

        CasosDeEstudio::create([
            'descripcion_caso' => $nombreSinExtension,
            'id_area' => $request->categoria,
            'nombre_archivo' => $nombreArchivo
        ]);
        session()->flash('success', 'El caso se registro con Exito');
        return redirect()->back();
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
        $tribunal->delete();

        session()->flash('success','Caso eliminado Exitosamente');
        return redirect()->back();
    }
}
