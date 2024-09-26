<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FacPNivelController;
use App\Http\Controllers\LaboratoryController;
use App\Http\Controllers\FacPCupsController;
use App\Http\Controllers\FacPProfesionalController;
use App\Http\Controllers\GenPDocumentoController;
use App\Http\Controllers\GenPEpsController;
use App\Http\Controllers\ListaOpcionController;
use App\Http\Controllers\LabMOrdenController;
use App\Http\Controllers\LabMOrdenResultadosController;
use App\Http\Controllers\LabPGruposController;
use App\Http\Controllers\LabPProcedimientosController;
use App\Http\Controllers\LabPPruebasController;
use App\Http\Controllers\LabPPruebasOpcionesController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Aquí es donde puedes registrar las rutas API para tu aplicación.
| Estas rutas son cargadas por el RouteServiceProvider dentro de un grupo
| que está asignado al grupo middleware "api". ¡Disfruta construyendo tu API!
|
*/
//Consulta
Route::post('/laboratory-orders', [LaboratoryController::class, 'getLaboratoryOrders']);

// Rutas para el controlador FacPNivel
Route::get('/fac_p_nivel', [FacPNivelController::class, 'index']);
Route::post('/fac_p_nivel', [FacPNivelController::class, 'store']);
Route::get('/fac_p_nivel/{id}', [FacPNivelController::class, 'show']);
Route::put('/fac_p_nivel/{id}', [FacPNivelController::class, 'update']);
Route::delete('/fac_p_nivel/{id}', [FacPNivelController::class, 'destroy']);

//
Route::get('/fac_p_cups', [FacPCupsController::class, 'index']);
Route::post('/fac_p_cups', [FacPCupsController::class, 'store']);
Route::get('/fac_p_cups/{id}', [FacPCupsController::class, 'show']);
Route::put('/fac_p_cups/{id}', [FacPCupsController::class, 'update']);
Route::delete('/fac_p_cups/{id}', [FacPCupsController::class, 'destroy']);

//
Route::get('/fac_p_profesional', [FacPProfesionalController::class, 'index']);
Route::post('/fac_p_profesional', [FacPProfesionalController::class, 'store']);
Route::get('/fac_p_profesional/{id}', [FacPProfesionalController::class, 'show']);
Route::put('/fac_p_profesional/{id}', [FacPProfesionalController::class, 'update']);
Route::delete('/fac_p_profesional/{id}', [FacPProfesionalController::class, 'destroy']);

//
Route::get('/gen_p_documento', [GenPDocumentoController::class, 'index']);
Route::post('/gen_p_documento', [GenPDocumentoController::class, 'store']);
Route::get('/gen_p_documento/{id}', [GenPDocumentoController::class, 'show']);
Route::put('/gen_p_documento/{id}', [GenPDocumentoController::class, 'update']);
Route::delete('/gen_p_documento/{id}', [GenPDocumentoController::class, 'destroy']);

//
Route::get('/gen_p_eps', [GenPEpsController::class, 'index']);
Route::post('/gen_p_eps', [GenPEpsController::class, 'store']);
Route::get('/gen_p_eps/{id}', [GenPEpsController::class, 'show']);
Route::put('/gen_p_eps/{id}', [GenPEpsController::class, 'update']);
Route::delete('/gen_p_eps/{id}', [GenPEpsController::class, 'destroy']);

// Rutas para el controlador ListaOpcion
Route::get('/opciones', [ListaOpcionController::class, 'index']); // Obtener todas las opciones
Route::post('/opciones', [ListaOpcionController::class, 'store']); // Crear una nueva opción
Route::get('/opciones/{id}', [ListaOpcionController::class, 'show']); // Obtener una opción específica
Route::put('/opciones/{id}', [ListaOpcionController::class, 'update']); // Actualizar una opción
Route::delete('/opciones/{id}', [ListaOpcionController::class, 'destroy']); // Eliminar una opción


// Rutas para el controlador LabMOrden
Route::get('/ordenes', [LabMOrdenController::class, 'index']); // Obtener todas las órdenes
Route::post('/ordenes', [LabMOrdenController::class, 'store']); // Crear una nueva orden
Route::get('/ordenes/{id}', [LabMOrdenController::class, 'show']); // Obtener una orden específica
Route::put('/ordenes/{id}', [LabMOrdenController::class, 'update']); // Actualizar una orden
Route::delete('/ordenes/{id}', [LabMOrdenController::class, 'destroy']); // Eliminar una orden

// Rutas para el controlador LabMOrdenResultados
Route::get('/resultados', [LabMOrdenResultadosController::class, 'index']); // Obtener todos los resultados
Route::post('/resultados', [LabMOrdenResultadosController::class, 'store']); // Crear un nuevo resultado
Route::get('/resultados/{id}', [LabMOrdenResultadosController::class, 'show']); // Obtener un resultado específico
Route::put('/resultados/{id}', [LabMOrdenResultadosController::class, 'update']); // Actualizar un resultado
Route::delete('/resultados/{id}', [LabMOrdenResultadosController::class, 'destroy']); // Eliminar un resultado

// Rutas para el controlador LabPGrupos
Route::get('/grupos', [LabPGruposController::class, 'index']); // Obtener todos los grupos
Route::post('/grupos', [LabPGruposController::class, 'store']); // Crear un nuevo grupo
Route::get('/grupos/{id}', [LabPGruposController::class, 'show']); // Obtener un grupo específico
Route::put('/grupos/{id}', [LabPGruposController::class, 'update']); // Actualizar un grupo
Route::delete('/grupos/{id}', [LabPGruposController::class, 'destroy']); // Eliminar un grupo

// Rutas para el controlador LabPProcedimientos
Route::get('/procedimientos', [LabPProcedimientosController::class, 'index']); // Obtener todos los procedimientos
Route::post('/procedimientos', [LabPProcedimientosController::class, 'store']); // Crear un nuevo procedimiento
Route::get('/procedimientos/{id}', [LabPProcedimientosController::class, 'show']); // Obtener un procedimiento específico
Route::put('/procedimientos/{id}', [LabPProcedimientosController::class, 'update']); // Actualizar un procedimiento
Route::delete('/procedimientos/{id}', [LabPProcedimientosController::class, 'destroy']); // Eliminar un procedimiento

// Rutas para el controlador LabPPruebas
Route::get('/pruebas', [LabPPruebasController::class, 'index']); // Obtener todas las pruebas
Route::post('/pruebas', [LabPPruebasController::class, 'store']); // Crear una nueva prueba
Route::get('/pruebas/{id}', [LabPPruebasController::class, 'show']); // Obtener una prueba específica
Route::put('/pruebas/{id}', [LabPPruebasController::class, 'update']); // Actualizar una prueba
Route::delete('/pruebas/{id}', [LabPPruebasController::class, 'destroy']); // Eliminar una prueba

// Rutas para el controlador LabPPruebasOpciones
Route::get('/pruebas-opciones', [LabPPruebasOpcionesController::class, 'index']); // Obtener todas las opciones de pruebas
Route::post('/pruebas-opciones', [LabPPruebasOpcionesController::class, 'store']); // Crear una nueva opción de prueba
Route::get('/pruebas-opciones/{id}', [LabPPruebasOpcionesController::class, 'show']); // Obtener una opción de prueba específica
Route::put('/pruebas-opciones/{id}', [LabPPruebasOpcionesController::class, 'update']); // Actualizar una opción de prueba
Route::delete('/pruebas-opciones/{id}', [LabPPruebasOpcionesController::class, 'destroy']); // Eliminar una opción de prueba

// Rutas para el controlador User
Route::get('/usuarios', [UserController::class, 'index']); // Obtener todos los usuarios
Route::post('/usuarios', [UserController::class, 'store']); // Crear un nuevo usuario
Route::get('/usuarios/{id}', [UserController::class, 'show']); // Obtener un usuario específico
Route::put('/usuarios/{id}', [UserController::class, 'update']); // Actualizar un usuario
Route::delete('/usuarios/{id}', [UserController::class, 'destroy']); // Eliminar un usuario
