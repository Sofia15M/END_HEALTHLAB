<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // Validación de los datos recibidos
        $validated = $request->validate([
            'id_tipoid' => 'required|string',
            'numeroid' => 'required|numeric',
            'fechanac' => 'required|date',
        ]);

        // Aquí puedes implementar la lógica de autenticación
        $user = User::where('id_tipoid', $request->id_tipoid)
                    ->where('numeroid', $request->numeroid)
                    ->where('fechanac', $request->fechanac)
                    ->first();

        if ($user) {
            return response()->json([
                'message' => 'Login exitoso',
                'user' => $user
            ], 200);
        } else {
            return response()->json([
                'message' => 'Credenciales incorrectas'
            ], 401);
        }
    }
}
