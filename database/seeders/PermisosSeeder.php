<?php

namespace Database\Seeders;

use App\Models\Permisos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermisosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $p = new Permisos();
        $p->nombre = 'dashboard';
        $p->ver = true;
        $p->save();

        $p = new Permisos();
        $p->nombre = 'usuarios';
        $p->ver = true;
        $p->editar = true;
        $p->crear = true;
        $p->save();

        $p = new Permisos();
        $p->nombre = 'perfiles';
        $p->ver = true;
        $p->editar = true;
        $p->crear = true;
        $p->save();

        $p = new Permisos();
        $p->nombre = 'impuestos';
        $p->ver = true;
        $p->editar = true;
        $p->crear = true;
        $p->save();

        $p = new Permisos();
        $p->nombre = 'sucursales';
        $p->ver = true;
        $p->editar = true;
        $p->crear = true;
        $p->save();

        $p = new Permisos();
        $p->nombre = 'timbrados';
        $p->ver = true;
        $p->editar = true;
        $p->crear = true;
        $p->save();

        $p = new Permisos();
        $p->nombre = 'cajas';
        $p->ver = true;
        $p->editar = true;
        $p->crear = true;
        $p->save();

        $p = new Permisos();
        $p->nombre = 'aperturas';
        $p->ver = true;
        $p->editar = true;
        $p->crear = true;
        $p->save();

        $p = new Permisos();
        $p->nombre = 'depositos';
        $p->ver = true;
        $p->editar = true;
        $p->crear = true;
        $p->save();

        $p = new Permisos();
        $p->nombre = 'productos';
        $p->ver = true;
        $p->editar = true;
        $p->crear = true;
        $p->save();

        $p = new Permisos();
        $p->nombre = 'clientes';
        $p->ver = true;
        $p->editar = true;
        $p->crear = true;
        $p->save();

        $p = new Permisos();
        $p->nombre = 'ventas';
        $p->ver = true;
        $p->editar = true;
        $p->crear = true;
        $p->save();

        $p = new Permisos();
        $p->nombre = 'proveedores';
        $p->ver = true;
        $p->editar = true;
        $p->crear = true;
        $p->save();

        $p = new Permisos();
        $p->nombre = 'compras';
        $p->ver = true;
        $p->editar = true;
        $p->crear = true;
        $p->save();

        $p = new Permisos();
        $p->nombre = 'transferencias';
        $p->ver = true;
        $p->crear = true;
        $p->save();
    }
}
