<?php

namespace App\Http\Livewire\Dashboards;

use App\Models\Productos;
use Livewire\Component;

class CardCostoInventarioActual extends Component
{
    public $costoInventario;

    public function render(){

        $this->costoInventario = 0;
        $prd = Productos::all();
        foreach($prd as $p){
            $cantidad = $p->depositos()->sum('cantidad');
            $this->costoInventario += $cantidad * $p->costo_promedio;
        }

        return view('livewire.dashboards.card-costo-inventario-actual');
    }
}
