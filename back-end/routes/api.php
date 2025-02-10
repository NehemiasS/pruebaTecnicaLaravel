<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AlumnoController;


Route::get('/alumno', [AlumnoController::class, 'index']);

Route::post('/crear-alumno', [AlumnoController::class, 'store']);
Route::get('/consultar-alumno/{grado}', [AlumnoController::class, 'mostrarGradoAlumno']);