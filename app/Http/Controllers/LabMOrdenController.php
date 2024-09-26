<?php

namespace App\Http\Controllers;

use App\Models\LabMOrden;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LabMOrdenController extends Controller
{
    // Obtener todas las órdenes
    public function index()
    {
        $ordenes = LabMOrden::all();
        return response()->json($ordenes);
    }

    // Crear una nueva orden
    public function store(Request $request)
    {
        $request->validate([
            'id_documento' => 'nullable|integer',
            'orden' => 'required|numeric',
            'fecha' => 'required|date',
            'id_historia' => 'nullable|integer',
            'id_profesional_ordena' => 'nullable|integer',
            'profesional_externo' => 'required|boolean',
        ]);

        $orden = LabMOrden::create($request->all());
        return response()->json($orden, Response::HTTP_CREATED);
    }

    // Obtener una orden específica
    public function show($id)
    {
        $orden = LabMOrden::findOrFail($id);
        return response()->json($orden);
    }

    // Actualizar una orden existente
    public function update(Request $request, $id)
    {
        $orden = LabMOrden::findOrFail($id);

        $request->validate([
            'id_documento' => 'nullable|integer',
            'orden' => 'required|numeric',
            'fecha' => 'required|date',
            'id_historia' => 'nullable|integer',
            'id_profesional_ordena' => 'nullable|integer',
            'profesional_externo' => 'required|boolean',
        ]);

        $orden->update($request->all());
        return response()->json($orden);
    }

    // Eliminar una orden
    public function destroy($id)
    {
        $orden = LabMOrden::findOrFail($id);
        $orden->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
