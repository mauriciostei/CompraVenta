<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class BuscadorInteligente extends Component
{
    public $busqueda = '';

    protected $rules = [
        'busqueda' => '',
    ];

    public function updated(){
        $this->emit('buscar', $this->busqueda);
    }

    public function render(){
        return view('livewire.components.buscador-inteligente');
    }
}
