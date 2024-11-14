<?php

namespace App\Http\Controllers;

use App\Models\Models\Carrera;
use App\Models\Models\Estudiante;

use Illuminate\Http\Request;

class GestionEstudianteController extends Controller
{
    public function vistaEstudiante()
    {
        
        $carreras = Carrera::all();
        $estudiantes = Estudiante::with(['carrera.facultad','defensa'])
            ->select('id_estudiante', 'nombre', 'apellido', 'telefono', 'correo', 'nroRegistro','id_carrera')
            ->get()
            ->map(function ($estudiante) {
               
                // Concatenar nombre y apellido en el formato "Apellido, Nombre"
                $nombreCompleto = "{$estudiante->apellido}, {$estudiante->nombre}";

                // Obtener facultad y carrera
                $facultad = $estudiante->carrera ? $estudiante->carrera->facultad->nombre_facultad ?? 'Sin Facultad' : 'Sin Facultad';
                $carrera = $estudiante->carrera ? $estudiante->carrera->nombre_carrera : 'Sin Carrera';
        
                // Definir los estados de defensa
                $estadoDefensaInterna = 'Pendiente';
                $estadoDefensaExterna = 'Pendiente';

                foreach ($estudiante->defensa as $defensa) {
                    if ($defensa->tipo_defensa === 'Defensa interna') {
                        if ($defensa->nota >= 51) {
                            $estadoDefensaInterna = 'Defensa Interna Aprobada';
                        } elseif ($defensa->nota === null) {
                            $estadoDefensaInterna = 'Defensa Interna Asignada';
                        }
                    } elseif ($defensa->tipo_defensa === 'Defensa externa') {
                        if ($defensa->nota >= 51) {
                            $estadoDefensaExterna = 'Defensa Externa Aprobada';
                        } elseif ($defensa->nota === null) {
                            $estadoDefensaExterna = 'Defensa Externa Asignada';
                        }
                    }
                }

                return [
                    'registro' => $estudiante->nroRegistro,
                    'nombre_completo' => $nombreCompleto,
                    'telefono' => $estudiante->telefono,
                    'correo' => $estudiante->correo,
                    'facultad' => $facultad,
                    'carrera' => $carrera,
                    'estado_defensa_interna' => $estadoDefensaInterna,
                    'estado_defensa_externa' => $estadoDefensaExterna,
                ];
            });

        return view('gestiondeestudiantes', compact('carreras', 'estudiantes'));
    }

    public function cargarEstudiantes(Request $request)
    {
        $request->validate([
            'registro' => 'required_without:archivoEstudiantes',
            'Nombre' => 'required_without:archivoEstudiantes',
            'Apellido' => 'required_without:archivoEstudiantes',
            'Carrera' => 'required_without:archivoEstudiantes|integer',
            'Telefono' => 'required_without:archivoEstudiantes|min:8',
            'Correo' => 'nullable|email',
            'archivoEstudiantes' => 'nullable|file|mimes:txt|max:2048',
        ], [
            'registro.required_without' => 'El campo registro es obligatorio si no se ha cargado un archivo.',
            'Nombre.required_without' => 'El campo Nombre es obligatorio si no se ha cargado un archivo.',
            'Apellido.required_without' => 'El campo Apellido es obligatorio si no se ha cargado un archivo.',
            'Carrera.required_without' => 'El campo Carrera es obligatorio si no se ha cargado un archivo.',
            'Telefono.required_without' => 'El campo Teléfono es obligatorio si no se ha cargado un archivo.',
            'Telefono.min' => 'El campo Teléfono debe tener al menos 8 caracteres.',
            'archivoEstudiantes.mimes' => 'El archivo debe ser un archivo de texto (.txt).',
            'archivoEstudiantes.max' => 'El archivo no puede superar los 2MB de tamaño.',
        ]);

        Estudiante::create([
            'nroRegistro' => $request->input('registro'),
            'nombre' => $request->input('Nombre'),
            'apellido' => $request->input('Apellido'),
            'telefono' => $request->input('Telefono'),
            'correo' => $request->input('Correo'),
            'id_carrera' => $request->input('Carrera')

        ]);

        return redirect()->back()->with('success', 'Estudiante registrado correctamente.');
    }
}
