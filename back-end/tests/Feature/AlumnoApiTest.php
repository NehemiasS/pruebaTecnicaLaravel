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

    private $headers;

    protected function setUp(): void
    {
        parent::setUp();

        $this->headers = [
            'Authorization' => 'Basic ' . base64_encode('admin:secret'), 
            //'Accept' => 'application/json',
        ];
    }

    public function test_crear_alumno()
    {
        $data =  [
            'nombre' => 'nehemias xicay',
            'fecha_nacimiento' => '2000-05-10',
            'nombre_padre' => 'lico simon',
            'nombre_madre' => 'marga xicay',
            'grado' => '10',
            'seccion' => 'A',
            'fecha_ingreso' => '2007-02-15',
        ];

        $response = $this->postJson('/api/crear-alumno', $data, $this->headers);

        $response->assertStatus(201);
        
        $this->assertDatabaseHas('alumnos',[
            'nombre' => 'nehemias xicay',
            'grado' => '10',
        ]);

        // \App::shouldReceive('middleware')->andReturnNull(); 

    }


    public function test_consultar_alumno_por_grado()
    { 
        //se crean 10 alumnos
        $alumnos = Alumno::factory(10)->create();

        Alumno::factory()->create([
            'grado' => '10',
            // 'nombre' => 'nehemias xicay',
        ]);

        $response = $this->getJson('/api/consultar-alumno/10', $this->headers);

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
