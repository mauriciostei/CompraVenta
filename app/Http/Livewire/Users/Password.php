<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Password extends Component
{
    public User $user;

    public $password;
    public $newPassword1;
    public $newPassword2;

    protected $rules = [
        'password' => 'required|current_password',
        'newPassword1' => 'required|min:5',
        'newPassword2' => 'required|min:5|same:newPassword1',
    ];

    public function mount(){
        $this->user = Auth::user();
    }

    public function render(){
        return view('livewire.users.password');
    }

    public function save(){
        $this->validate();

        $this->user->password = bcrypt($this->newPassword1);
        $this->user->save();
        session()->flash('toastMensaje', 'Usuario actualizado');
        return redirect('/miPerfil');
    }
}
