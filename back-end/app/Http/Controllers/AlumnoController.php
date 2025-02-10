<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Http\Controllers\Controller;
use App\Models\Alumno;
use Illuminate\Support\Facades\Validator;

class AlumnoController extends Controller
{
    public function index()
    {
        $alumnos = Alumno::all();

        $data = [
            'alumnos' => $alumnos,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

      // Crear un nuevo alumno
      public function store(Request $request)
      {
      try {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'fecha_nacimiento' => 'required|date',
            'nombre_padre' => 'required|string|max:255',
            'nombre_madre' => 'required|string|max:255',
            'grado' => 'required|string|max:255',
            'seccion' => 'required|string|max:255',
            'fecha_ingreso' => 'required|date',
        ]);

        $alumno = Alumno::create($validated);

        return response()->json($alumno, 201);
    }   catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 400);
    }
}
      // Consultar alumnos por grado
      public function mostrarGradoAlumno($grado)
      {
          $alumnos = Alumno::where('grado', $grado)->get();
  
          return response()->json($alumnos);
      }
}
