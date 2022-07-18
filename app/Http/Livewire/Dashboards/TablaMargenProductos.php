<?php

namespace App\Http\Livewire\Dashboards;

use App\Models\Inventarios;
use App\Models\Productos;
use Livewire\Component;
use Livewire\WithPagination;

class TablaMargenProductos extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.dashboards.tabla-margen-productos',[
            'productos' => Productos::paginate(5)
        ] );
    }
}
