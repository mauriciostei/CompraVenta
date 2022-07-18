<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Compras>
 */
class ComprasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'personas_id' => fake()->numberBetween(1,300),
            'aperturas_id' => 1,
            'fecha_hora' => fake()->dateTimeBetween('-4 days', 'now'),
            'numero_factura' => fake()->numberBetween(1000, 2000)
        ];
    }
}
