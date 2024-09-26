<?php

namespace App\Http\Controllers;

use App\Models\LabPPruebas;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LabPPruebasController extends Controller
{
    // Obtener todas las pruebas
    public function index()
    {
        $pruebas = LabPPruebas::all();
        return response()->json($pruebas);
    }

    // Crear una nueva prueba
    public function store(Request $request)
    {
        $request->validate([
            'id_procedimiento' => 'required|integer',
            'codigo_prueba' => 'required|string|max:6',
            'nombre_prueba' => 'required|string|max:200',
            'id_tipo_resultado' => 'required|integer',
            'unidad' => 'required|string|max:20',
            'habilita' => 'required|boolean',
        ]);

        $prueba = LabPPruebas::create($request->all());
        return response()->json($prueba, Response::HTTP_CREATED);
    }

    // Obtener una prueba específica
    public function show($id)
    {
        $prueba = LabPPruebas::findOrFail($id);
        return response()->json($prueba);
    }

    // Actualizar una prueba existente
    public function update(Request $request, $id)
    {
        $prueba = LabPPruebas::findOrFail($id);

        $request->validate([
            'id_procedimiento' => 'required|integer',
            'codigo_prueba' => 'required|string|max:6',
            'nombre_prueba' => 'required|string|max:200',
            'id_tipo_resultado' => 'required|integer',
            'unidad' => 'required|string|max:20',
            'habilita' => 'required|boolean',
        ]);

        $prueba->update($request->all());
        return response()->json($prueba);
    }

    // Eliminar una prueba
    public function destroy($id)
    {
        $prueba = LabPPruebas::findOrFail($id);
        $prueba->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
