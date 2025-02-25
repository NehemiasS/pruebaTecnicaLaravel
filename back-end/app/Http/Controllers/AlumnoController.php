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
        $request->validate([
            'nombre' => 'required|string',
            'fecha_nacimiento' => 'required|date',
            'nombre_padre' => 'required|string',
            'nombre_madre' => 'required|string',
            'grado' => 'required|string',
            'seccion' => 'required|string',
            'fecha_ingreso' => 'required|date',
        ]);

        $alumno = Alumno::create($request->all());
        return response()->json($alumno, 201);
}
      // Consultar alumnos por grado
      public function mostrarGradoAlumno($grado)
      {
          $alumnos = Alumno::where('grado', $grado)->get();

          if($alumnos->isEmpty())
          {
            return response()->json(['message'=> 'No hay alumnos'], 404);
          }
  
          return response()->json($alumnos);
      }
}
