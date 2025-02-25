<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AlumnoController;
use App\Http\Middleware\BasicAuthMiddleware;


Route::get('/alumno', [AlumnoController::class, 'index']);

// Route::post('/crear-alumno', [AlumnoController::class, 'store']);
// Route::get('/consultar-alumno/{grado}', [AlumnoController::class, 'mostrarGradoAlumno']);

// Route::middleware('auth.basic')->group(function () {
//     Route::post('/crear-alumno', [AlumnoController::class, 'store']); // Método correcto: store()
//     Route::get('/consultar-alumno/{grado}', [AlumnoController::class, 'mostrarGradoAlumno']); // Método correcto: mostrarGradoAlumno()
// });
Route::middleware([BasicAuthMiddleware::class])->group(function () {
    Route::post('/crear-alumno', [AlumnoController::class, 'store']);
    Route::get('/consultar-alumno/{grado}', [AlumnoController::class, 'mostrarGradoAlumno']);
});