<?php

namespace App\Http\Livewire\Dashboards;

use App\Models\Compras;
use Livewire\Component;

class CardComprasTotalHoy extends Component
{
    public $compras;

    public function render(){
        
        $this->compras = 0;
        $compras = Compras::whereDate('fecha_hora', date('Y-m-d'))->get();
        $this->prueba = $compras;

        foreach($compras as $v){
            foreach($v->productos as $p){
                $this->compras += $p->pivot->cantidad * $p->pivot->precio;
            }
        }

        return view('livewire.dashboards.card-compras-total-hoy');
    }
}
