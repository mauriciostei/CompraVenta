<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Productos>
 */
class ProductosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre' => fake()->unique()->sentence(1),
            'costo_unitario' => fake()->numberBetween(1000, 250000),
            'costo_promedio' => fake()->numberBetween(1000, 250000),
            'costo_ultima_compra' => fake()->numberBetween(1000, 250000),
            'cantidad_quiebre' => fake()->numberBetween(10,50)
        ];
    }
}
