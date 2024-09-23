<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Curso>
 */
class CursoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'titulo' => $this->faker->sentence,
            'descripcion' => $this->faker->paragraph,
            'duracion' => $this->faker->numberBetween(1, 100),
            'precio' => $this->faker->randomFloat(2, 10, 1000),
            'modalidad' => $this->faker->randomElement(['presencial', 'online']),
            'dias' => implode(', ', $this->faker->randomElements(['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'], 3)), // Selecciona 3 días aleatorios
            'horarios' => $this->faker->time,
            'imagen' => $this->faker->imageUrl(640, 480, 'education', true, 'curso'), // URL de imagen aleatoria
        ];
    }
}
