<?php

namespace App\Http\Controllers;

use App\Models\Models\Carrera;
use App\Models\Models\Estudiante;

use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Http\Request;

class GestionEstudianteController extends Controller
{
    public function vistaEstudiante()
    {
        $carreras = Carrera::all();

        $estudiantes = Estudiante::with(['carrera.facultad', 'defensa'])
            ->orderBy('id_estudiante', 'desc') // Ordenar por ID descendente
            ->take(10) // Tomar los 10 últimos
            ->select('id_estudiante', 'nombre', 'apellido', 'telefono', 'correo', 'nroRegistro', 'id_carrera')
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
        $carreras = Carrera::all();
        $carrerasMap = $carreras->pluck('id_carrera', 'nombre_carrera')->toArray();



        $request->validate([
            'archivoEstudiantes' => 'sometimes|required|file|mimetypes:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/vnd.ms-excel|max:2048',
            'registro' => 'sometimes|required_without:archivoEstudiantes',
            'Nombre' => 'sometimes|required_without:archivoEstudiantes',
            'Apellido' => 'sometimes|required_without:archivoEstudiantes',
            'Carrera' => 'nullable|integer',
            'Telefono' => 'nullable|min:8',
            'Correo' => 'nullable|email',
        ], [
            'registro.required_without' => 'El campo registro es obligatorio si no se ha cargado un archivo.',
            'Nombre.required_without' => 'El campo Nombre es obligatorio si no se ha cargado un archivo.',
            'Apellido.required_without' => 'El campo Apellido es obligatorio si no se ha cargado un archivo.',
            'archivoEstudiantes.required' => 'El archivo es obligatorio.',
            'archivoEstudiantes.mimes' => 'El archivo debe ser un archivo Excel (.xlsx o .xls).',
            'archivoEstudiantes.max' => 'El archivo no puede superar los 2MB de tamaño.',
            'Telefono.min' => 'El campo Teléfono debe tener al menos 8 caracteres.',
        ]);
        if ($request->hasFile('archivoEstudiantes')) {
        }

        if ($request->hasFile('archivoEstudiantes')) {
            try {
                $file = $request->file('archivoEstudiantes');
                $spreadsheet = IOFactory::load($file->getPathName());
                $sheet = $spreadsheet->getActiveSheet();
                $rows = $sheet->toArray(null, true, true, true);

                $estudiantes = [];
                foreach ($rows as $index => $row) {
                    if ($index === 1 || empty($row['A']) || empty($row['B']) || empty($row['C'])) {
                        continue; // Saltar encabezados o filas incompletas
                    }

                    $idCarrera = $carrerasMap[$row['D']] ?? null;
                    $estudiantes[] = [
                        'nroRegistro' => $row['A'],
                        'nombre' => $row['B'],
                        'apellido' => $row['C'],
                        'id_carrera' => $idCarrera,
                        'telefono' => $row['E'],
                        'correo' => $row['F'],
                    ];
                }

                foreach ($estudiantes as $estudiante) {
                    Estudiante::create($estudiante);
                }

                session()->flash('success', 'Estudiantes importados correctamente desde el archivo Excel.');
                return redirect()->back();
            } catch (\Exception $e) {
                session()->flash('error', 'Error al procesar el archivo: ' . $e->getMessage());
                return redirect()->back();
            }
        } else {
            Estudiante::create([
                'nroRegistro' => $request->input('registro'),
                'nombre' => $request->input('Nombre'),
                'apellido' => $request->input('Apellido'),
                'telefono' => $request->input('Telefono'),
                'correo' => $request->input('Correo'),
                'id_carrera' => $request->input('Carrera'),
            ]);

            session()->flash('success', 'Estudiante guardado correctamente.');
            return redirect()->back();
        }
    }
}
