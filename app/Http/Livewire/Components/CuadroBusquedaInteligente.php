<?php

namespace App\Http\Livewire\Components;

use App\Models\Personas;
use Livewire\Component;

class CuadroBusquedaInteligente extends Component
{
    public $mostrar = false;
    public $busqueda = '';

    public $personas;

    protected $listeners = ['buscar'];

    public function buscar($text){
        $this->busqueda = $text;


        $this->personas = Personas::where('nombre', 'like', '%'.$this->busqueda.'%')->get();
    }

    public function render(){
        return view('livewire.components.cuadro-busqueda-inteligente');
    }
}
