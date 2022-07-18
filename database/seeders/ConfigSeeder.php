<?php

namespace Database\Seeders;

use App\Models\Aperturas;
use App\Models\Cajas;
use App\Models\Depositos;
use App\Models\Ivas;
use App\Models\Personas;
use App\Models\Productos;
use App\Models\Sucursales;
use App\Models\Timbrados;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $t = new Timbrados();
        $t->numero = 239847;
        $t->fecha_inicio = '2022-07-01';
        $t->fecha_fin = '2023-07-01';
        $t->factura_inicio = 1000;
        $t->factura_fin = 3000;
        $t->factura_actual = 1000;
        $t->save();

        $c = new Cajas();
        $c->nombre = 'Caja Central 1';
        $c->sucursales_id = 1;
        $c->timbrados_id = 1;
        $c->monto_actual = 800000;
        $c->expedicion_fiscal = '001 - 001';
        $c->save();

        $c = new Cajas();
        $c->nombre = 'Caja Central 2';
        $c->sucursales_id = 1;
        $c->timbrados_id = 1;
        $c->monto_actual = 350000;
        $c->expedicion_fiscal = '001 - 006';
        $c->save();

        $c = new Cajas();
        $c->nombre = 'Caja Auxiliar 1';
        $c->sucursales_id = 2;
        $c->timbrados_id = 1;
        $c->monto_actual = 550000;
        $c->expedicion_fiscal = '001 - 002';
        $c->save();

        $c = new Cajas();
        $c->nombre = 'Caja Auxiliar 2';
        $c->sucursales_id = 3;
        $c->timbrados_id = 1;
        $c->monto_actual = 550000;
        $c->expedicion_fiscal = '001 - 003';
        $c->save();

        $c = new Cajas();
        $c->nombre = 'Caja Auxiliar 3';
        $c->sucursales_id = 4;
        $c->timbrados_id = 1;
        $c->monto_actual = 550000;
        $c->expedicion_fiscal = '001 - 004';
        $c->save();

        $c = new Cajas();
        $c->nombre = 'Caja Auxiliar 4';
        $c->sucursales_id = 5;
        $c->timbrados_id = 1;
        $c->monto_actual = 550000;
        $c->expedicion_fiscal = '001 - 005';
        $c->save();

        $i = new Ivas();
        $i->nombre = '10%';
        $i->multiplo = 0.0909;
        $i->save();

        $i = new Ivas();
        $i->nombre = '5%';
        $i->multiplo = 0.0476;
        $i->save();

        $i = new Ivas();
        $i->nombre = 'Exenta';
        $i->multiplo = 0;
        $i->save();

        $ap = new Aperturas();
        $ap->cajas_id = 1;
        $ap->users_id = 1;
        $ap->monto_apertura = 800000;
        $ap->save();
    }
}
