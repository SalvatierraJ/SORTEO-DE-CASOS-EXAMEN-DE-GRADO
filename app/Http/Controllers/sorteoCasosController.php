<?php

namespace App\Http\Controllers;

use App\Mail\EnviarCasoMail;
use App\Models\Models\CasosDeEstudio;
use App\Models\Models\Defensa;
use App\Models\Models\Estudiante;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class sorteoCasosController extends Controller
{
    public function vistaSorteo()
    {
        $estudiantes = Estudiante::with(['carrera.facultad', 'defensa'])
            ->orderBy('id_estudiante', 'desc')
            ->select('id_estudiante', 'nombre', 'apellido', 'telefono', 'correo', 'nroRegistro', 'id_carrera')
            ->get()
            ->map(function ($estudiante) {

                $nombreCompleto = "{$estudiante->apellido}, {$estudiante->nombre}";

                $estadoDefensaInterna = 'Pendiente';
                $estadoDefensaExterna = 'Pendiente';
                $mostrarEstudiante = true;
                foreach ($estudiante->defensa as $defensa) {
                    if ($defensa->tipo_defensa === 'Defensa interna') {
                        if ($defensa->nota >= 51) {
                            $estadoDefensaInterna = 'Defensa Interna Aprobada';
                        } elseif ($defensa->nota === null) {
                            $estadoDefensaInterna = 'Defensa Interna Asignada';
                            $mostrarEstudiante = false;
                        }
                    } elseif ($defensa->tipo_defensa === 'Defensa externa') {
                        if ($defensa->nota >= 51) {
                            $estadoDefensaExterna = 'Defensa Externa Aprobada';
                            $mostrarEstudiante = false;
                        } elseif ($defensa->nota === null) {
                            $estadoDefensaExterna = 'Defensa Externa Asignada';
                        }
                    }
                }
                if ($estadoDefensaInterna === 'Defensa Interna Aprobada' && $estadoDefensaExterna === 'Pendiente') {
                    $mostrarEstudiante = true;
                }
                if (!$mostrarEstudiante) {
                    return null;
                }

                return [
                    'id_estudiante' => $estudiante->id_estudiante,
                    'registro' => $estudiante->nroRegistro,
                    'nombre_completo' => $nombreCompleto,
                    'telefono' => $estudiante->telefono,
                    'correo' => $estudiante->correo,
                    'estado_defensa_interna' => $estadoDefensaInterna,
                    'estado_defensa_externa' => $estadoDefensaExterna,
                ];
            })
            ->filter()
            ->values();

        $estudiantes = collect($estudiantes);
        return view('layouts.sorteo', compact('estudiantes'));
    }
    public function buscarEstudiante(Request $request)
    {
        $texto = trim($request->q);


        $resultado = Estudiante::with(['carrera.facultad', 'defensa'])
            ->where(function ($query) use ($texto) {
                // Criterios de búsqueda por nroregistro, apellido + nombre o nombre + apellido
                $query->where('nroregistro', 'like', "%$texto%")
                    ->orWhereRaw("LOWER(CONCAT(apellido, ' ', nombre)) LIKE LOWER(?)", ["%$texto%"])
                    ->orWhereRaw("LOWER(CONCAT(nombre, ' ', apellido)) LIKE LOWER(?)", ["%$texto%"]);
            })
            ->orderBy('id_estudiante', 'desc')
            ->select('id_estudiante', 'nombre', 'apellido', 'telefono', 'correo', 'nroRegistro', 'id_carrera')
            ->get()
            ->map(function ($estudiante) use ($texto) {

                $nombreCompleto = "{$estudiante->apellido}, {$estudiante->nombre}";


                $estadoDefensaInterna = 'Pendiente';
                $estadoDefensaExterna = 'Pendiente';
                $mostrarEstudiante = true;

                // Recorremos las defensas del estudiante
                foreach ($estudiante->defensa as $defensa) {
                    if ($defensa->tipo_defensa === 'Defensa interna') {
                        if ($defensa->nota >= 51) {
                            $estadoDefensaInterna = 'Defensa Interna Aprobada';
                        } elseif ($defensa->nota === null) {
                            $estadoDefensaInterna = 'Defensa Interna Asignada';
                            $mostrarEstudiante = false;
                        }
                    } elseif ($defensa->tipo_defensa === 'Defensa externa') {
                        if ($defensa->nota >= 51) {
                            $estadoDefensaExterna = 'Defensa Externa Aprobada';
                            $mostrarEstudiante = false;
                        } elseif ($defensa->nota === null) {
                            $estadoDefensaExterna = 'Defensa Externa Asignada';
                        }
                    }
                }

                // Excluir estudiantes con defensa interna y externa con nota superior a 51
                if ($estadoDefensaInterna === 'Defensa Interna Aprobada' && $estadoDefensaExterna === 'Defensa Externa Aprobada') {
                    $mostrarEstudiante = false;
                }

                // Incluir estudiantes con defensa interna aprobada y sin defensa externa asignada
                if ($estadoDefensaInterna === 'Defensa Interna Aprobada' && $estadoDefensaExterna === 'Pendiente') {
                    $mostrarEstudiante = true;
                }


                if (!$mostrarEstudiante) {
                    return null;
                }

                return [
                    'id_estudiante' => $estudiante->id_estudiante,
                    'registro' => $estudiante->nroRegistro,
                    'nombre_completo' => $nombreCompleto,
                    'telefono' => $estudiante->telefono,
                    'correo' => $estudiante->correo,
                    'estado_defensa_interna' => $estadoDefensaInterna,
                    'estado_defensa_externa' => $estadoDefensaExterna,
                ];
            })
            ->filter()
            ->values();


        return response()->json($resultado);
    }

    public function crearDefensa($id, $tipoDefensa)
    {
        $estudiante = Estudiante::find($id);
        if (!$estudiante) {
            return response()->json(['message' => 'Estudiante no encontrado.'], 404);
        }

        // Verificar si ya tiene una defensa del mismo tipo con nota asignada
        $defensaAsignada = Defensa::where('id_estudiante', $id)
            ->first();

        // Validar límites de intentos
        if ($tipoDefensa == 'Defensa interna' && $estudiante->intentos_interna >= 3) {
            return response()->json(['message' => 'Límite de intentos internos alcanzado.'], 400);
        } elseif ($tipoDefensa == 'Defensa externa' && $estudiante->intentos_externa >= 3) {
            return response()->json(['message' => 'Límite de intentos externos alcanzado.'], 400);
        }

        // Obtener área y caso de estudio
        $area = DB::select('CALL ObtenerAreaAleatoria()');
        if (empty($area)) {
            return response()->json(['message' => 'No se encontraron áreas disponibles.'], 400);
        }
        $area = $area[0]; // Tomar el primer resultado

        $caso = CasosDeEstudio::getRandomCaseByArea($area->id_area);
        $i = 1;

        if ($defensaAsignada) {
            while ($caso && $defensaAsignada->id_casoEstudio == $caso->id) {
                $i++;
                $caso = CasosDeEstudio::getRandomCaseByArea($area->id_area);

                // Salir del bucle después de 3 intentos
                if ($i >= 3) {
                    break;
                }
            }
        }

        if (empty($caso)) {
            return response()->json(['message' => 'No se encontraron casos de estudio para el área seleccionada.'], 400);
        }

        // Crear defensa
        $fechaMas7Dias = Carbon::now()->addDays(6)->toDateString();
        $defensa = Defensa::create([
            'fecha' => $fechaMas7Dias,
            'tipo_defensa' => $tipoDefensa,
            'id_estudiante' => $id,
            'id_casoEstudio' => $caso->id_casoEstudio,
        ]);
        $idUltimaDefensa = $defensa->id_defensa;
        $nombreCompleto = $estudiante->nombre . ' ,' . $estudiante->apellido;
        return response()->json([
            'id_defensa'=> $idUltimaDefensa,
            'id_estudiante' => $estudiante->id_estudiante,
            'nombre_completo' => $nombreCompleto,
            'nombre_area' => $area->nombre_area,
            'nombre_caso' => $caso->descripcion_caso,
            'fecha' => $fechaMas7Dias,
            'tipo_defensa' => $tipoDefensa
        ], 200);
    }

   
    public function enviarCaso($estudianteId,$defensaId)
    {
    
        $estudiante = Estudiante::find($estudianteId);
        
        if (!$estudiante || !$estudiante->correo) {
            return response()->json(['message' => 'Estudiante o correo no encontrado.'], 404);
        }
        $defensa =Defensa::find($defensaId);

        $caso = CasosDeEstudio::find($defensa->id_casoEstudio);

        $rutaArchivo = storage_path('app/private/private/' . $caso->nombre_archivo);
        // Datos para el correo
        $nombreEstudiante = $estudiante->nombre . ' ' . $estudiante->apellido;
        $mensaje = 'Este es el caso que se te ha asignado para tu defensa'.', la fecha de defensa sera el '.$defensa->fecha;

        // Enviar el correo al estudiante
        Mail::to($estudiante->correo)->send(new EnviarCasoMail($nombreEstudiante, $mensaje, $rutaArchivo));

        return response()->json(['message' => 'Correo enviado con éxito.']);
    }
}
