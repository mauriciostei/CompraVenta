<?php

namespace App\Http\Livewire\Dashboards;

use App\Models\Ventas;
use Livewire\Component;

class CardVentasTotalHoy extends Component
{
    public $ventas;

    public function render(){

        $this->ventas = 0;
        $ventas = Ventas::whereDate('fecha_hora', date('Y-m-d'))->get();

        foreach($ventas as $v){
            foreach($v->productos as $p){
                $this->ventas += $p->pivot->cantidad * $p->pivot->precio;
            }
        }

        return view('livewire.dashboards.card-ventas-total-hoy');
    }
}
