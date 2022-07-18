<?php

namespace App\Http\Livewire\Components;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MenuUsuario extends Component
{
    // public $menu = [];
    // public $categorias = [];

    // public function mount(){
    //     $user =  Auth::user();

    //     $permisos = $user->perfiles->map->permisos->flatten()->unique('pivot.salt');
    //     foreach($permisos as $p){
    //         $piv = explode('-', $p->pivot->salt);
    //         if($piv[1] == 'ver'){
    //             array_push($this->menu, $p);
    //         }
    //     }

    //     $this->categorias = $user->perfiles->map->permisos->flatten()->sortBy('id')->unique('categoria');
    // }

    public function render(){
        return view('livewire.components.menu-usuario');
    }
}
