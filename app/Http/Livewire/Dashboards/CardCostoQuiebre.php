<?php

namespace App\Http\Livewire\Dashboards;

use App\Models\Inventarios;
use Livewire\Component;

class CardCostoQuiebre extends Component
{
    public $costo;

    public function render(){

        $this->costo = 0;
        foreach(Inventarios::all() as $in){
            if($in->cantidad < $in->productos->cantidad_quiebre){
                $can = $in->productos->cantidad_quiebre - $in->cantidad;
                $this->costo = $can * $in->productos->costo_promedio;
            }
        }

        return view('livewire.dashboards.card-costo-quiebre');
    }
}
