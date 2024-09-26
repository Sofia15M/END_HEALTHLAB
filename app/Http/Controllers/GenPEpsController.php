<?php

namespace App\Http\Controllers;

use App\Models\GenPEps;
use Illuminate\Http\Request;

class GenPEpsController extends Controller
{
    /**
     * Mostrar todas las EPS.
     */
    public function index()
    {
        // Obtener todas las EPS
        $eps = GenPEps::all();
        return response()->json($eps, 200);
    }

    /**
     * Crear una nueva EPS.
     */
    public function store(Request $request)
    {
        // Validar los datos
        $validatedData = $request->validate([
            'codigo' => 'required|string|max:8',
            'razonsocial' => 'required|string|max:250',
            'nit' => 'nullable|string|max:20',
            'habilita' => 'required|boolean',
        ]);

        // Crear una nueva EPS
        $eps = GenPEps::create($validatedData);

        return response()->json($eps, 201);
    }

    /**
     * Mostrar una EPS específica.
     */
    public function show($id)
    {
        // Buscar la EPS por su ID
        $eps = GenPEps::find($id);

        if (!$eps) {
            return response()->json(['message' => 'EPS no encontrada'], 404);
        }

        return response()->json($eps, 200);
    }

    /**
     * Actualizar una EPS específica.
     */
    public function update(Request $request, $id)
    {
        // Buscar la EPS por su ID
        $eps = GenPEps::find($id);

        if (!$eps) {
            return response()->json(['message' => 'EPS no encontrada'], 404);
        }

        // Validar los datos
        $validatedData = $request->validate([
            'codigo' => 'sometimes|string|max:8',
            'razonsocial' => 'sometimes|string|max:250',
            'nit' => 'nullable|string|max:20',
            'habilita' => 'sometimes|boolean',
        ]);

        // Actualizar la EPS
        $eps->update($validatedData);

        return response()->json($eps, 200);
    }

    /**
     * Eliminar una EPS.
     */
    public function destroy($id)
    {
        // Buscar la EPS por su ID
        $eps = GenPEps::find($id);

        if (!$eps) {
            return response()->json(['message' => 'EPS no encontrada'], 404);
        }

        // Eliminar la EPS
        $eps->delete();

        return response()->json(['message' => 'EPS eliminada correctamente'], 200);
    }
}
