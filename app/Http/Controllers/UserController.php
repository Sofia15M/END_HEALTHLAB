<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    // Obtener todos los usuarios (pacientes)
    public function index()
    {
        $usuarios = User::all();
        return response()->json($usuarios);
    }

    // Crear un nuevo usuario (paciente)
    public function store(Request $request)
    {
        $request->validate([
            'id_tipoid' => 'required|integer',
            'numeroid' => 'required|string|max:20',
            'apellido1' => 'required|string|max:20',
            'apellido2' => 'nullable|string|max:20',
            'nombre1' => 'required|string|max:20',
            'nombre2' => 'nullable|string|max:20',
            'fechanac' => 'nullable|date',
            'id_sexobiologico' => 'nullable|integer',
            'direccion' => 'nullable|string|max:250',
            'tel_movil' => 'nullable|string|max:10',
            'email' => 'nullable|string|email|max:250',
        ]);

        $usuario = User::create($request->all());
        return response()->json($usuario, Response::HTTP_CREATED);
    }

    // Obtener un usuario específico
    public function show($id)
    {
        $usuario = User::findOrFail($id);
        return response()->json($usuario);
    }

    // Actualizar un usuario existente
    public function update(Request $request, $id)
    {
        $usuario = User::findOrFail($id);

        $request->validate([
            'id_tipoid' => 'required|integer',
            'numeroid' => 'required|string|max:20',
            'apellido1' => 'required|string|max:20',
            'apellido2' => 'nullable|string|max:20',
            'nombre1' => 'required|string|max:20',
            'nombre2' => 'nullable|string|max:20',
            'fechanac' => 'nullable|date',
            'id_sexobiologico' => 'nullable|integer',
            'direccion' => 'nullable|string|max:250',
            'tel_movil' => 'nullable|string|max:10',
            'email' => 'nullable|string|email|max:250',
        ]);

        $usuario->update($request->all());
        return response()->json($usuario);
    }

    // Eliminar un usuario
    public function destroy($id)
    {
        $usuario = User::findOrFail($id);
        $usuario->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
