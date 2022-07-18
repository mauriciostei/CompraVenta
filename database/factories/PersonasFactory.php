<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Personas>
 */
class PersonasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre' => fake()->name(),
            'documento' => fake()->numberBetween(10000,999999),
            'digito_verificador' => fake()->numberBetween(1,9),
            'cliente' => fake()->boolean(),
            'proveedor' => fake()->boolean()
        ];
    }
}
