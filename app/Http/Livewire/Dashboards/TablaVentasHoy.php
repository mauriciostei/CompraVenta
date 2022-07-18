<?php

namespace App\Http\Livewire\Dashboards;

use App\Models\Ventas;
use Livewire\Component;
use Livewire\WithPagination;

class TablaVentasHoy extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render(){
        return view('livewire.dashboards.tabla-ventas-hoy', [
            'ventas' => Ventas::whereDate('fecha_hora', date('Y-m-d'))->paginate(5)
        ]);
    }
}
