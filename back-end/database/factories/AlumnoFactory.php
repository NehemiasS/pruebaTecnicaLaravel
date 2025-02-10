<?php

namespace Database\Factories;
use App\Models\Alumno;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Alumno>
 */
class AlumnoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Alumno::class;

    public function definition(): array
    {
        return [
                'nombre' => $this->faker->name,
                'fecha_nacimiento' => $this->faker->date(),
                'nombre_padre' => $this->faker->name,
                'nombre_madre' => $this->faker->name,
                'grado' => $this->faker->word,
                'seccion' => $this->faker->word,
                'fecha_ingreso' => $this->faker->date(),
        ];
    }
    
}
