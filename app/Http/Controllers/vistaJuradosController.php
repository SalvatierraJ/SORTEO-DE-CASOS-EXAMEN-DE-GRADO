<?php

namespace App\Http\Controllers;

use App\Models\Models\Tribunal;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class vistaJuradosController extends Controller
{
    public function vistaJurado()
    {
        $tribunales = Tribunal::take(10)->get();
        return view('layouts.vistaJurados', compact('tribunales'));
    }

    public function cargarJurado(Request $request)
    {

        $request->validate([
            'registro' => 'required',
            'nombre' => 'required',
            'apellido' => 'required',
            'telefono' => 'required|min:8',
            'correo' => 'required|email'
        ], [
            'registro' => 'el campo registro es obligatorio',
            'nombre' => 'el campo nombre es obligatorio',
            'apellido' => 'el campo apellido es obligatorio',
            'telefono' => 'el campo telefono debe de tener minimo 8 numero ',
            'correo' => 'el campo correo es obligatorio'
        ]);

        Tribunal::Create([
            'registro' => $request->input('registro'),
            'nombre' => $request->input('nombre'),
            'apellido' => $request->input('apellido'),
            'correo' => $request->input('correo'),
            'telefono' => $request->input('telefono')
        ]);

        session()->flash('success', 'Jurado guardado correctamente.');
        return redirect()->back();
    }

    public function buscarTribunal($id)
    {
        $tribunal = Tribunal::find($id);

        if (!$tribunal) {
            session()->flash('error', 'Tribunal no encontrado');
            return redirect()->back();
        }

        return response()->json($tribunal);
    }

    public function editarTribunal(Request $request)
    {

        $validatedData = $request->validate([
            'registro' => 'required|string|max:255',
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'telefono' => 'required|digits:8',
            'correo' => 'required|email',
            'estado' => 'required|in:Activo,Inactivo',
        ]);


        $tribunal = Tribunal::find($request->id_tribunal);

        if (!$tribunal) {
            return redirect()->back()->with('error', 'Tribunal no encontrado');
        }


        $tribunal->registro = $validatedData['registro'];
        $tribunal->nombre = $validatedData['nombre'];
        $tribunal->apellido = $validatedData['apellido'];
        $tribunal->telefono = $validatedData['telefono'];
        $tribunal->correo = $validatedData['correo'];
        $tribunal->estado = $validatedData['estado'];


        $tribunal->save();

        return redirect()->back()->with('success', 'Tribunal actualizado correctamente');
    }
}
