<?php

namespace App\Http\Controllers;

use App\Models\Depositos;
use App\Models\Sucursales;
use Illuminate\Http\Request;

class DepositosController extends Controller
{
    public function index(){
        $depositos = Depositos::paginate(10);
        return view('depositos.list')->with('depositos', $depositos);
    }

    public function create(){
        $sucursales = Sucursales::all();
        return view('depositos.create')->with('sucursales', $sucursales);
    }

    public function store(Request $request){
        $request->validate([
            'nombre' => 'required|string',
            'sucursales_id' => 'integer|min:1'
        ]);

        $dep = new Depositos();
        $dep->sucursales_id = $request->sucursales_id;
        $dep->nombre = $request->nombre;
        $dep->save();

        session()->flash('toastMensaje', 'Deposito creado con éxito!');
        return redirect('/depositos');
    }

    public function edit($id){
        $deposito = Depositos::find($id);
        $sucursales = Sucursales::all();

        return view('depositos.edit')
            ->with('sucursales', $sucursales)
            ->with('deposito', $deposito)
        ;
    }

    public function update($id, Request $request){
        $request->validate([
            'nombre' => 'required|string',
            'sucursales_id' => 'integer|min:1'
        ]);

        $dep = Depositos::find($id);
        $dep->sucursales_id = $request->sucursales_id;
        $dep->nombre = $request->nombre;
        $dep->activo = $request->activo ? true : false;
        $dep->save();

        session()->flash('toastMensaje', 'Deposito actualizado con éxito!');
        return redirect('/depositos');
    }
}
