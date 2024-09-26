<?php

namespace App\Http\Controllers;

use App\Models\GenPListaOpcion;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ListaOpcionController extends Controller
{
    // Mostrar todas las opciones habilitadas
    public function index(Request $request)
    {
        $opcionesHabilitadas = GenPListaOpcion::habilitados()->paginate(10);

        return response()->json($opcionesHabilitadas);
    }

    // Almacenar una nueva opción en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'variable' => 'required|string|max:50',
            'descripcion' => 'required|string|max:100',
            'valor' => 'required|integer',
            'nombre' => 'required|string|max:100',
            'abreviacion' => 'required|string|max:10',
            'habilita' => 'required|boolean',
        ]);

        $opcion = GenPListaOpcion::create($request->all());

        return response()->json($opcion, Response::HTTP_CREATED);
    }

    // Mostrar una opción específica
    public function show(GenPListaOpcion $opcion)
    {
        return response()->json($opcion);
    }

    // Actualizar una opción en la base de datos
    public function update(Request $request, GenPListaOpcion $opcion)
    {
        $request->validate([
            'variable' => 'required|string|max:50',
            'descripcion' => 'required|string|max:100',
            'valor' => 'required|integer',
            'nombre' => 'required|string|max:100',
            'abreviacion' => 'required|string|max:10',
            'habilita' => 'required|boolean',
        ]);

        $opcion->update($request->all());

        return response()->json($opcion);
    }

    // Eliminar una opción de la base de datos
    public function destroy(GenPListaOpcion $opcion)
    {
        $opcion->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
