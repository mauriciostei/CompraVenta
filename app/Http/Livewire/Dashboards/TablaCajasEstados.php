<?php

namespace App\Http\Livewire\Dashboards;

use App\Models\Cajas;
use Livewire\Component;
use Livewire\WithPagination;

class TablaCajasEstados extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render(){
        return view('livewire.dashboards.tabla-cajas-estados', [
            'cajas' => Cajas::paginate(5)
        ]);
    }
}
