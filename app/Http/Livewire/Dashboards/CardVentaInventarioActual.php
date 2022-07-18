<?php

namespace App\Http\Livewire\Dashboards;

use App\Models\Productos;
use Livewire\Component;

class CardVentaInventarioActual extends Component
{
    public $costoInventario;

    public function render(){
        $this->costoInventario = 0;

        $prd = Productos::all();
        foreach($prd as $p){
            $cantidad = $p->depositos()->sum('cantidad');
            $this->costoInventario += $cantidad * $p->costo_unitario;
        }

        return view('livewire.dashboards.card-venta-inventario-actual');
    }
}
