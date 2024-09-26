<?php

namespace App\Http\Controllers;

use App\Models\LabPPruebasOpciones;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LabPPruebasOpcionesController extends Controller
{
    // Obtener todas las opciones de pruebas
    public function index()
    {
        $opciones = LabPPruebasOpciones::all();
        return response()->json($opciones);
    }

    // Crear una nueva opción de prueba
    public function store(Request $request)
    {
        $request->validate([
            'id_prueba' => 'required|integer',
            'opcion' => 'required|string|max:250',
            'valor_ref_min_f' => 'nullable|numeric',
            'valor_ref_max_f' => 'nullable|numeric',
            'valor_ref_min_m' => 'nullable|numeric',
            'valor_ref_max_m' => 'nullable|numeric',
        ]);

        $opcion = LabPPruebasOpciones::create($request->all());
        return response()->json($opcion, Response::HTTP_CREATED);
    }

    // Obtener una opción de prueba específica
    public function show($id)
    {
        $opcion = LabPPruebasOpciones::findOrFail($id);
        return response()->json($opcion);
    }

    // Actualizar una opción de prueba existente
    public function update(Request $request, $id)
    {
        $opcion = LabPPruebasOpciones::findOrFail($id);

        $request->validate([
            'id_prueba' => 'required|integer',
            'opcion' => 'required|string|max:250',
            'valor_ref_min_f' => 'nullable|numeric',
            'valor_ref_max_f' => 'nullable|numeric',
            'valor_ref_min_m' => 'nullable|numeric',
            'valor_ref_max_m' => 'nullable|numeric',
        ]);

        $opcion->update($request->all());
        return response()->json($opcion);
    }

    // Eliminar una opción de prueba
    public function destroy($id)
    {
        $opcion = LabPPruebasOpciones::findOrFail($id);
        $opcion->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
