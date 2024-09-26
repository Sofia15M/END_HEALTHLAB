<?php

namespace App\Http\Controllers;

use App\Models\FacPProfesional;
use Illuminate\Http\Request;

class FacPProfesionalController extends Controller
{
    /**
     * Mostrar todos los registros de FacPProfesional.
     */
    public function index()
    {
        // Obtener todos los profesionales
        $profesionales = FacPProfesional::all();
        return response()->json($profesionales, 200);
    }

    /**
     * Crear un nuevo registro en FacPProfesional.
     */
    public function store(Request $request)
    {
        // Validar los datos
        $validatedData = $request->validate([
            'codigo' => 'required|string|max:4',
            'id_persona' => 'nullable|integer',
            'registro_medico' => 'nullable|string|max:20',
            'id_tipo_prof' => 'nullable|integer',
        ]);

        // Crear un nuevo profesional
        $profesional = FacPProfesional::create($validatedData);

        return response()->json($profesional, 201);
    }

    /**
     * Mostrar un registro específico de FacPProfesional.
     */
    public function show($id)
    {
        // Buscar el registro por su ID
        $profesional = FacPProfesional::find($id);

        if (!$profesional) {
            return response()->json(['message' => 'Profesional no encontrado'], 404);
        }

        return response()->json($profesional, 200);
    }

    /**
     * Actualizar un registro específico de FacPProfesional.
     */
    public function update(Request $request, $id)
    {
        // Buscar el registro por su ID
        $profesional = FacPProfesional::find($id);

        if (!$profesional) {
            return response()->json(['message' => 'Profesional no encontrado'], 404);
        }

        // Validar los datos
        $validatedData = $request->validate([
            'codigo' => 'sometimes|string|max:4',
            'id_persona' => 'sometimes|integer',
            'registro_medico' => 'sometimes|string|max:20',
            'id_tipo_prof' => 'sometimes|integer',
        ]);

        // Actualizar el registro
        $profesional->update($validatedData);

        return response()->json($profesional, 200);
    }

    /**
     * Eliminar un registro de FacPProfesional.
     */
    public function destroy($id)
    {
        // Buscar el registro por su ID
        $profesional = FacPProfesional::find($id);

        if (!$profesional) {
            return response()->json(['message' => 'Profesional no encontrado'], 404);
        }

        // Eliminar el registro
        $profesional->delete();

        return response()->json(['message' => 'Profesional eliminado correctamente'], 200);
    }
}
