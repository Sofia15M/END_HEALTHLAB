<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FacPNivel;

class FacPNivelController extends Controller
{
    /**
     * Obtener todos los niveles.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $niveles = FacPNivel::all();
        return response()->json($niveles);
    }

    /**
     * Crear un nuevo nivel.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_eps' => 'required|integer',
            'nivel' => 'required|string|max:4',
            'nombre' => 'required|string|max:50',
            'id_regimen' => 'required|integer',
        ]);

        $nivel = FacPNivel::create($request->all());

        return response()->json($nivel, 201);
    }

    /**
     * Mostrar un nivel específico por ID.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $nivel = FacPNivel::find($id);

        if (!$nivel) {
            return response()->json(['message' => 'Nivel no encontrado'], 404);
        }

        return response()->json($nivel);
    }

    /**
     * Actualizar un nivel específico.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $nivel = FacPNivel::find($id);

        if (!$nivel) {
            return response()->json(['message' => 'Nivel no encontrado'], 404);
        }

        $request->validate([
            'id_eps' => 'integer',
            'nivel' => 'string|max:4',
            'nombre' => 'string|max:50',
            'id_regimen' => 'integer',
        ]);

        $nivel->update($request->all());

        return response()->json($nivel);
    }

    /**
     * Eliminar un nivel específico.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $nivel = FacPNivel::find($id);

        if (!$nivel) {
            return response()->json(['message' => 'Nivel no encontrado'], 404);
        }

        $nivel->delete();

        return response()->json(['message' => 'Nivel eliminado']);
    }
}
