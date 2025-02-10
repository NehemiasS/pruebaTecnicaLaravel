<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumnoController;


Route::get('/alumno', [AlumnoController::class, 'index']);

Route::get('/', function () {
    return view('welcome');
});

Route::post('/crear-alumno', [AlumnoController::class, 'store']);
Route::get('/consultar-alumno/{grado}', [AlumnoController::class, 'mostrarGradoAlumno']);
// Route::middleware('auth.basic')->post('/crear-alumno', [AlumnoController::class, 'crear']);
// Route::middleware('auth.basic')->get('/consultar-alumno/{grado}', [AlumnoController::class, 'mostrarGradoAlumno']);