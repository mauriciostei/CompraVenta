<?php

namespace Database\Seeders;

use App\Models\Perfiles;
use App\Models\Permisos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PerfilesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $p = new Perfiles();
        $p->nombre = 'admin';
        $p->save();
        $p->users()->attach(1);

        foreach(Permisos::all() as $pe){
            if($pe->ver){
                $p->permisos()->attach($pe->id, array('salt' => $pe->nombre."-ver"));
            }
            if($pe->crear){
                $p->permisos()->attach($pe->id, array('salt' => $pe->nombre."-crear"));
            }
            if($pe->editar){
                $p->permisos()->attach($pe->id, array('salt' => $pe->nombre."-editar"));
            }
        }
    }
}
