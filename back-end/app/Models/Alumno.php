<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Alumno extends Model
{
    use HasFactory;

    // Definir la tabla si no sigue la convención (opcional)
    protected $table = 'alumnos'; 

    // Definir los campos que se pueden asignar masivamente
    protected $fillable = [
        'nombre', 'fecha_nacimiento', 'nombre_padre', 'nombre_madre', 'grado', 'seccion', 'fecha_ingreso',
    ];
}
