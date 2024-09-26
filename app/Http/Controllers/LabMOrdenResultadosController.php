<?php

namespace App\Http\Controllers;

use App\Models\LabMOrdenResultados;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LabMOrdenResultadosController extends Controller
{
    // Obtener todos los resultados
    public function index()
    {
        $resultados = LabMOrdenResultados::all();
        return response()->json($resultados);
    }

    // Crear un nuevo resultado
    public function store(Request $request)
    {
        $request->validate([
            'fecha' => 'required|date',
            'id_orden' => 'required|integer',
            'id_procedimiento' => 'required|integer',
            'id_prueba' => 'required|integer',
            'id_pruebaopcion' => 'nullable|integer',
            'res_opcion' => 'nullable|string|max:250',
            'res_numerico' => 'nullable|numeric',
            'res_texto' => 'nullable|string|max:60',
            'res_memo' => 'nullable|string|max:2500',
            'num_procesamientos' => 'nullable|integer',
        ]);

        $resultado = LabMOrdenResultados::create($request->all());
        return response()->json($resultado, Response::HTTP_CREATED);
    }

    // Obtener un resultado específico
    public function show($id)
    {
        $resultado = LabMOrdenResultados::findOrFail($id);
        return response()->json($resultado);
    }

    // Actualizar un resultado existente
    public function update(Request $request, $id)
    {
        $resultado = LabMOrdenResultados::findOrFail($id);

        $request->validate([
            'fecha' => 'required|date',
            'id_orden' => 'required|integer',
            'id_procedimiento' => 'required|integer',
            'id_prueba' => 'required|integer',
            'id_pruebaopcion' => 'nullable|integer',
            'res_opcion' => 'nullable|string|max:250',
            'res_numerico' => 'nullable|numeric',
            'res_texto' => 'nullable|string|max:60',
            'res_memo' => 'nullable|string|max:2500',
            'num_procesamientos' => 'nullable|integer',
        ]);

        $resultado->update($request->all());
        return response()->json($resultado);
    }

    // Eliminar un resultado
    public function destroy($id)
    {
        $resultado = LabMOrdenResultados::findOrFail($id);
        $resultado->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
