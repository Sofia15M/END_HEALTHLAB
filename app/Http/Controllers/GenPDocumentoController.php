<?php

namespace App\Http\Controllers;

use App\Models\GenPDocumento;
use Illuminate\Http\Request;

class GenPDocumentoController extends Controller
{
    /**
     * Mostrar todos los documentos.
     */
    public function index()
    {
        // Obtener todos los documentos
        $documentos = GenPDocumento::all();
        return response()->json($documentos, 200);
    }

    /**
     * Crear un nuevo documento.
     */
    public function store(Request $request)
    {
        // Validar los datos
        $validatedData = $request->validate([
            'codigo' => 'required|string|max:4',
            'nombre' => 'required|string|max:254',
            'habilita' => 'required|boolean',
        ]);

        // Crear un nuevo documento
        $documento = GenPDocumento::create($validatedData);

        return response()->json($documento, 201);
    }

    /**
     * Mostrar un documento específico.
     */
    public function show($id)
    {
        // Buscar el documento por su ID
        $documento = GenPDocumento::find($id);

        if (!$documento) {
            return response()->json(['message' => 'Documento no encontrado'], 404);
        }

        return response()->json($documento, 200);
    }

    /**
     * Actualizar un documento específico.
     */
    public function update(Request $request, $id)
    {
        // Buscar el documento por su ID
        $documento = GenPDocumento::find($id);

        if (!$documento) {
            return response()->json(['message' => 'Documento no encontrado'], 404);
        }

        // Validar los datos
        $validatedData = $request->validate([
            'codigo' => 'sometimes|string|max:4',
            'nombre' => 'sometimes|string|max:254',
            'habilita' => 'sometimes|boolean',
        ]);

        // Actualizar el documento
        $documento->update($validatedData);

        return response()->json($documento, 200);
    }

    /**
     * Eliminar un documento.
     */
    public function destroy($id)
    {
        // Buscar el documento por su ID
        $documento = GenPDocumento::find($id);

        if (!$documento) {
            return response()->json(['message' => 'Documento no encontrado'], 404);
        }

        // Eliminar el documento
        $documento->delete();

        return response()->json(['message' => 'Documento eliminado correctamente'], 200);
    }
}
