<?php

namespace App\Http\Livewire\Dashboards;

use App\Models\Cajas;
use Livewire\Component;

class CardCajasActual extends Component
{
    public $monto;
    
    public function render(){
        
        $this->monto = 0;
        foreach(Cajas::all() as $c){
            $this->monto += $c->monto_actual;
        }

        return view('livewire.dashboards.card-cajas-actual');
    }
}
