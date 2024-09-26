<?php

namespace App\Http\Controllers;

use App\Models\LabPGrupos;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LabPGruposController extends Controller
{
    // Obtener todos los grupos
    public function index()
    {
        $grupos = LabPGrupos::all();
        return response()->json($grupos);
    }

    // Crear un nuevo grupo
    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required|string|max:2',
            'nombre' => 'required|string|max:60',
            'habilita' => 'required|boolean',
        ]);

        $grupo = LabPGrupos::create($request->all());
        return response()->json($grupo, Response::HTTP_CREATED);
    }

    // Obtener un grupo específico
    public function show($id)
    {
        $grupo = LabPGrupos::findOrFail($id);
        return response()->json($grupo);
    }

    // Actualizar un grupo existente
    public function update(Request $request, $id)
    {
        $grupo = LabPGrupos::findOrFail($id);

        $request->validate([
            'codigo' => 'required|string|max:2',
            'nombre' => 'required|string|max:60',
            'habilita' => 'required|boolean',
        ]);

        $grupo->update($request->all());
        return response()->json($grupo);
    }

    // Eliminar un grupo
    public function destroy($id)
    {
        $grupo = LabPGrupos::findOrFail($id);
        $grupo->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
