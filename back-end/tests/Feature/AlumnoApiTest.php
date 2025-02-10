<?php

namespace Tests\Feature;

use App\Models\Alumno;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AlumnoApiTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;
    

    public function test_crear_alumno()
    {
        

        $response = $this->postJson('/api/crear-alumno', [
            'nombre' => 'nehemias xicay',
            'fecha_nacimiento' => '2000-05-10',
            'nombre_padre' => 'lico simon',
            'nombre_madre' => 'marga xicay',
            'grado' => '10',
            'seccion' => 'A',
            'fecha_ingreso' => '2007-02-15',
        ]);

        $response->assertStatus(201);
        
        $response->assertJson([
            'nombre' => 'nehemias xicay',
            'grado' => '10',
        ]);

        // \App::shouldReceive('middleware')->andReturnNull(); 

    }

    public function test_consultar_alumno_por_grado()
    { 
        $alumnos = Alumno::factory(10)->create();

        Alumno::factory()->create([
            'grado' => '10',
            'nombre' => 'nehemias xicay',
        ]);

        $response = $this->getJson('/api/consultar-alumno/10');

        $response->assertStatus(200);
        $response->assertJsonCount(1);

        // \App::shouldReceive('middleware')->andReturnNull();
    }


    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
