<?php

namespace App\Http\Controllers;

use App\Models\Ivas;
use Illuminate\Http\Request;

class IvasController extends Controller
{
    public function index(){
        $ivas = Ivas::paginate(10);
        return view('ivas.list')->with('ivas', $ivas);
    }

    public function create(){
        return view('ivas.create');
    }

    public function store(Request $request){
        $request->validate([
            'nombre' => 'required|string',
            'multiplo' => 'required'
        ]);

        $iva = new Ivas();
        $iva->nombre = $request->nombre;
        $iva->multiplo = $request->multiplo;
        $iva->save();

        session()->flash('toastMensaje', 'Impuesto creado con éxito!');
        return redirect('/ivas');
    }

    public function edit($id){
        $iva = Ivas::find($id);
        return view('ivas.edit')->with('iva', $iva);
    }

    public function update($id, Request $request){
        $request->validate([
            'nombre' => 'required|string',
            'multiplo' => 'required'
        ]);

        $iva = Ivas::find($id);
        $iva->nombre = $request->nombre;
        $iva->multiplo = $request->multiplo;
        $iva->save();

        session()->flash('toastMensaje', 'Impuesto actualizado con éxito!');
        return redirect('/ivas');
    }
}
