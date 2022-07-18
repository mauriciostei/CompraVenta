<?php

namespace App\Http\Livewire\Dashboards;

use App\Models\Inventarios;
use Livewire\Component;
use Livewire\WithPagination;

class TablaInventarioActual extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render(){
        return view('livewire.dashboards.tabla-inventario-actual', [
            'inventarioActual' => Inventarios::where('cantidad', '>', 0)->orderBy('cantidad', 'asc')->paginate(5)
        ]);
    }
}
