<?php

namespace App\Http\Controllers;

use App\Models\Perfiles;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class UsersController extends Controller
{
    public function index(){
        $users = User::paginate(10);
        return view('users.list')->with('users', $users);
    }

    public function create(){
        $perfiles = Perfiles::where('activo', true)->get();
        return view('users.create')->with('perfiles', $perfiles);
    }

    public function edit($id){
        $user = User::find($id);
        $perfiles = Perfiles::where('activo', true)->get();

        foreach($perfiles as $pe){
            $pe->activado = false;
            foreach($user->perfiles as $per){
                if($pe->id == $per->id){
                    $pe->activado = true;
                }
            }
        }

        return view('users.edit')
            ->with('user', $user)
            ->with('perfiles', $perfiles)
        ;
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|min:5'
        ]);

        $us = new User();
        $us->name = $request->name;
        $us->email = $request->email;
        $us->password = bcrypt($us->password);
        $us->save();
        $us->perfiles()->attach($request->perfiles);

        session()->flash('toastMensaje', 'Usuario creado con éxito!');
        return redirect('/users');
    }

    public function update($id, Request $request){
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
        ]);

        $us = User::find($id);
        $us->name = $request->name;
        $us->email = $request->email;
        $us->save();
        $us->perfiles()->sync($request->perfiles);

        session()->flash('toastMensaje', 'Usuario actualizado con éxito!');
        return redirect('/users');
    }

    public function loginForm(){
        return view('users.login');
    }

    public function miPerfil(){
        return view('users.miPerfil', ['user' => Auth::user()]);
    }

    public function loginValidate(Request $request){
        $validate = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(!Auth::attempt($validate)){
            throw ValidationException::withMessages(['email', 'Usuario o contraseña invalida']);
        }

        session()->regenerate();

        session()->flash('toastMensaje', 'Bienvenido a la aplicación');
        return redirect('/');
    }
}
