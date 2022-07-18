<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MisDatos extends Component
{
    public User $user;

    protected $rules = [
        'user.name' => 'required|min:6',
        'user.email' => 'required|email',
    ];

    public function mount(){
        $this->user = Auth::user();
    }

    public function render(){
        return view('livewire.users.mis-datos');
    }

    public function save(){
        $this->validate();
        $this->user->save();

        session()->flash('toastMensaje', 'Usuario actualizado');
        return redirect('/miPerfil');
    }
}
