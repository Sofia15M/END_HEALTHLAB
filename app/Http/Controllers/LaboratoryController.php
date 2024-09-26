<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaboratoryController extends Controller
{
    /**
     * Consulta las órdenes de laboratorio de un paciente basado en su número de identificación.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getLaboratoryOrders(Request $request)
    {
        // Validamos el número de identificación ingresado por el paciente
        $request->validate([
            'numeroid' => 'required|string|max:20'
        ]);

        $numeroid = $request->input('numeroid');

        // Consultamos el ID del paciente en base a su número de identificación
        $patient = DB::table('users')
            ->where('numeroid', $numeroid)
            ->first();

        if (!$patient) {
            return response()->json(['error' => 'Paciente no encontrado'], 404);
        }

        // Consultamos las órdenes de laboratorio y sus resultados
        $orders = DB::table('lab_m_orden as orden')
            ->join('lab_m_orden_resultados as resultado', 'orden.id', '=', 'resultado.id_orden')
            ->join('lab_p_pruebas as prueba', 'resultado.id_prueba', '=', 'prueba.id')
            ->join('fac_p_cups as cups', 'prueba.id_procedimiento', '=', 'cups.id')
            ->where('orden.id_historia', $patient->id)
            ->select(
                'orden.orden', 'orden.fecha', 'resultado.res_opcion',
                'resultado.res_numerico', 'resultado.res_texto',
                'prueba.nombre_prueba', 'cups.nombre as nombre_procedimiento'
            )
            ->get();

        // Si no se encontraron órdenes, devolver un mensaje adecuado
        if ($orders->isEmpty()) {
            return response()->json(['message' => 'No se encontraron órdenes de laboratorio'], 404);
        }

        return response()->json($orders);
    }
}
