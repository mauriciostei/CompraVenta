<?php

namespace App\Http\Controllers;

use App\Models\Sucursales;
use Illuminate\Http\Request;

class SucursalesController extends Controller
{
    public function index(){
        $sucursales = Sucursales::paginate(10);
        return view('sucursales.list')->with('sucursales', $sucursales);
    }

    public function create(){
        return view('sucursales.create');
    }

    public function store(Request $request){
        $request->validate([
            'nombre' => 'required|string',
            'telefono' => 'required|integer'
        ]);

        $s = new Sucursales();
        $s->nombre = $request->nombre;
        $s->telefono = $request->telefono;
        $s->save();

        session()->flash('toastMensaje', 'Sucursal creada con éxito!');
        return redirect('/sucursales');
    }

    public function edit($id){
        $sucursal = Sucursales::find($id);
        return view('sucursales.edit')->with('sucursal', $sucursal);
    }

    public function update($id, Request $request){
        $request->validate([
            'nombre' => 'required|string',
            'telefono' => 'required|integer'
        ]);

        $s = Sucursales::find($id);
        $s->nombre = $request->nombre;
        $s->telefono = $request->telefono;
        $s->activo = $request->activo ? true : false;
        $s->save();

        session()->flash('toastMensaje', 'Sucursal actualizada con éxito!');
        return redirect('/sucursales');
    }
}
