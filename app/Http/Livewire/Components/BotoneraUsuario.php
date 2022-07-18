<?php

namespace App\Http\Livewire\Components;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class BotoneraUsuario extends Component
{
    public User $user;

    public function mount(){
        $this->user = Auth::user();
    }

    public function render(){
        return view('livewire.components.botonera-usuario');
    }

    public function logout(){
        Auth::logout();
        session()->regenerate();
        return redirect('login');
    }
}
