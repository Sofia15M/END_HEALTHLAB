<?php

namespace App\Http\Controllers;

use App\Models\LabPProcedimientos;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LabPProcedimientosController extends Controller
{
    // Obtener todos los procedimientos
    public function index()
    {
        $procedimientos = LabPProcedimientos::all();
        return response()->json($procedimientos);
    }

    // Crear un nuevo procedimiento
    public function store(Request $request)
    {
        $request->validate([
            'id_cups' => 'required|integer',
            'id_grupo_laboratorio' => 'required|integer',
            'metodo' => 'nullable|string|max:60',
        ]);

        $procedimiento = LabPProcedimientos::create($request->all());
        return response()->json($procedimiento, Response::HTTP_CREATED);
    }

    // Obtener un procedimiento específico
    public function show($id)
    {
        $procedimiento = LabPProcedimientos::findOrFail($id);
        return response()->json($procedimiento);
    }

    // Actualizar un procedimiento existente
    public function update(Request $request, $id)
    {
        $procedimiento = LabPProcedimientos::findOrFail($id);

        $request->validate([
            'id_cups' => 'required|integer',
            'id_grupo_laboratorio' => 'required|integer',
            'metodo' => 'nullable|string|max:60',
        ]);

        $procedimiento->update($request->all());
        return response()->json($procedimiento);
    }

    // Eliminar un procedimiento
    public function destroy($id)
    {
        $procedimiento = LabPProcedimientos::findOrFail($id);
        $procedimiento->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
