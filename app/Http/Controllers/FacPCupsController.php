<?php

namespace App\Http\Controllers;

use App\Models\FacPCups;
use Illuminate\Http\Request;

class FacPCupsController extends Controller
{
    /**
     * Mostrar todos los registros habilitados de FacPCups.
     */
    public function index()
    {
        // Obtiene todos los registros donde 'habilita' sea 1
        $cups = FacPCups::habilitados()->get();
        return response()->json($cups, 200);
    }

    /**
     * Crear un nuevo registro en FacPCups.
     */
    public function store(Request $request)
    {
        // Validar los datos
        $validatedData = $request->validate([
            'codigo' => 'required|string|max:8',
            'nombre' => 'required|string|max:500',
            'habilita' => 'required|boolean',
        ]);

        // Crear un nuevo registro
        $cups = FacPCups::create($validatedData);

        return response()->json($cups, 201);
    }

    /**
     * Mostrar un registro específico de FacPCups.
     */
    public function show($id)
    {
        // Buscar el registro por su ID
        $cups = FacPCups::find($id);

        if (!$cups) {
            return response()->json(['message' => 'CUPS no encontrado'], 404);
        }

        return response()->json($cups, 200);
    }

    /**
     * Actualizar un registro específico de FacPCups.
     */
    public function update(Request $request, $id)
    {
        // Buscar el registro por su ID
        $cups = FacPCups::find($id);

        if (!$cups) {
            return response()->json(['message' => 'CUPS no encontrado'], 404);
        }

        // Validar los datos
        $validatedData = $request->validate([
            'codigo' => 'sometimes|string|max:8',
            'nombre' => 'sometimes|string|max:500',
            'habilita' => 'sometimes|boolean',
        ]);

        // Actualizar el registro
        $cups->update($validatedData);

        return response()->json($cups, 200);
    }

    /**
     * Eliminar un registro de FacPCups.
     */
    public function destroy($id)
    {
        // Buscar el registro por su ID
        $cups = FacPCups::find($id);

        if (!$cups) {
            return response()->json(['message' => 'CUPS no encontrado'], 404);
        }

        // Eliminar el registro
        $cups->delete();

        return response()->json(['message' => 'CUPS eliminado correctamente'], 200);
    }
}
