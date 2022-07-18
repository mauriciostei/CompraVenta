<?php

namespace App\Http\Controllers;

use App\Models\Timbrados;
use Illuminate\Http\Request;

class TimbradosController extends Controller
{
    public function index(){
        $timbrados = Timbrados::paginate(10);
        return view('timbrados.list')->with('timbrados', $timbrados);
    }

    public function create(){
        return view('timbrados.create');
    }

    public function store(Request $request){
        $request->validate([
            'numero' => 'required|integer|min:1',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after:fecha_inicio',
            'factura_inicio' => 'required|integer|min:1',
            'factura_fin' => 'required|integer|gt:factura_inicio'
        ]);

        $t = new Timbrados();
        $t->numero = $request->numero;
        $t->fecha_inicio = $request->fecha_inicio;
        $t->fecha_fin = $request->fecha_fin;
        $t->factura_inicio = $request->factura_inicio;
        $t->factura_fin = $request->factura_fin;
        $t->factura_actual = $request->factura_inicio;
        $t->save();

        session()->flash('toastMensaje', 'Timbrado creado con éxito!');
        return redirect('/timbrados');
    }

    public function edit($id){
        $timbrado = Timbrados::find($id);
        return view('timbrados.edit')->with('timbrado', $timbrado);
    }

    public function update($id, Request $request){
        $request->validate([
            'numero' => 'required|integer|min:1',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after:fecha_inicio',
            'factura_inicio' => 'required|integer|min:1',
            'factura_fin' => 'required|integer|gt:factura_inicio'
        ]);

        $t = Timbrados::find($id);

        if($t->factura_actual == $t->factura_inicio){
            $t->factura_actual = $request->factura_inicio;
        }

        $t->numero = $request->numero;
        $t->fecha_inicio = $request->fecha_inicio;
        $t->fecha_fin = $request->fecha_fin;
        $t->factura_inicio = $request->factura_inicio;
        $t->factura_fin = $request->factura_fin;
        $t->save();

        session()->flash('toastMensaje', 'Timbrado actualizado con éxito!');
        return redirect('/timbrados');
    }
}
