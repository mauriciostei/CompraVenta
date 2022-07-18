<?php

namespace Database\Seeders;

use App\Models\Compras;
use App\Models\Depositos;
use App\Models\Personas;
use App\Models\Productos;
use App\Models\Sucursales;
use App\Models\Ventas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            UsersSeeder::class,
            PermisosSeeder::class,
            PerfilesSeeder::class,
        ]);


        // Sucursales::factory(5)->create();
        // Personas::factory(300)->create();
        // Depositos::factory(15)->create();
        // Productos::factory(20)->create()->each(function($product){
        //     $product->depositos()->attach( fake()->numberBetween(1,15), array('cantidad' => fake()->numberBetween(10,50)) );
        // });

        // $this->call([
        //     ConfigSeeder::class
        // ]);

        // Compras::factory(50)->create()->each(function($compra){
        //     $p1 = Productos::find( fake()->numberBetween(1,10) );
        //     $p2 = Productos::find( fake()->numberBetween(11,20) );

        //     $compra->productos()->attach( $p1->id, array('depositos_id' => fake()->numberBetween(1,15), 'ivas_id' => fake()->numberBetween(1,3), 'cantidad' => fake()->numberBetween(1,10), 'precio' => $p1->costo_promedio ) );
        //     $compra->productos()->attach( $p2->id, array('depositos_id' => fake()->numberBetween(1,15), 'ivas_id' => fake()->numberBetween(1,3), 'cantidad' => fake()->numberBetween(1,10), 'precio' => $p2->costo_promedio ) );
        // });

        // Ventas::factory(100)->create()->each(function($ventas){
        //     $p1 = Productos::find( fake()->numberBetween(1,10) );
        //     $p2 = Productos::find( fake()->numberBetween(11,20) );

        //     $ventas->productos()->attach( $p1->id, array('depositos_id' => fake()->numberBetween(1,15), 'ivas_id' => fake()->numberBetween(1,3), 'cantidad' => fake()->numberBetween(1,5), 'precio' => $p1->costo_unitario ) );
        //     $ventas->productos()->attach( $p2->id, array('depositos_id' => fake()->numberBetween(1,15), 'ivas_id' => fake()->numberBetween(1,3), 'cantidad' => fake()->numberBetween(1,5), 'precio' => $p2->costo_unitario ) );
        // });
    }
}
