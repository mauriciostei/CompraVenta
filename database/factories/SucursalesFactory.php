<?php

namespace Database\Factories;

use App\Models\Sucursales;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sucursales>
 */
class SucursalesFactory extends Factory
{
    protected $model = Sucursales::class;
    
    public function definition()
    {
        return [
            'nombre' => fake()->company(),
            'telefono' => fake()->numberBetween(100000, 999999)
        ];
    }
}
