<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function login()
    {
        return  view('index');
    }

    public function loginVerificar(Request $request)
    {
        $request->validate([
            'usuario' => 'required',
            'password' => 'required|min:8'
        ], [
            'usuario.required' => 'usuario incorrecto o vacio',
            'contrasena.required' => 'contraseña incorrecta o vacia'
        ]);


        if (Auth::attempt(['usuario' => $request->usuario, 'password' => $request->password])) {
            return redirect()->route('dashboard');
        }


        return redirect()->back()->withErrors([
            'invalid_credentials' => 'Usuario o contraseña no válidos',
        ])->withInput();
    }
    public function cerrarSesion()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'sesion cerrada correctamente');
    }
    public function crearUsuarioAdmin()
    {
        Usuario::create([
            'nombre' => 'Javier',
            'apellido' => 'Salvatierra',
            'usuario' => 'javi',
            'password' => Hash::make('12345678'), // Encripta la contraseña
            'correo' => 'javi@example.com',
            'telefono' => '123456789',
            'estado' => 'activo',  // Puedes ajustar este valor según tu lógica de negocio
        ]);

        return "Usuario administrador creado correctamente.";
    }
}
