<?php

namespace App\Http\Controllers;

use App\Models\Cajas;
use App\Models\Sucursales;
use App\Models\Timbrados;
use Illuminate\Http\Request;

class CajasController extends Controller
{
    public function index(){
        $cajas = Cajas::paginate(10);
        return view('cajas.list')->with('cajas', $cajas);
    }

    public function create(){
        $sucursales = Sucursales::all();
        $timbrados = Timbrados::all();

        return view('cajas.create')
            ->with('sucursales', $sucursales)
            ->with('timbrados', $timbrados)
        ;
    }

    public function store(Request $request){
        $request->validate([
            'nombre' => 'required|string',
            'sucursales_id' => 'integer|min:1',
            'timbrados_id' => 'integer|min:1',
            'expedicion_fiscal' => 'required|string'
        ]);

        $caj = new Cajas();
        $caj->nombre = $request->nombre;
        $caj->sucursales_id = $request->sucursales_id;
        $caj->timbrados_id = $request->timbrados_id;
        $caj->expedicion_fiscal = $request->expedicion_fiscal;
        $caj->save();

        session()->flash('toastMensaje', 'Caja creada con éxito!');
        return redirect('/cajas');
    }

    public function edit($id){
        $caja = Cajas::find($id);
        $sucursales = Sucursales::all();
        $timbrados = Timbrados::all();

        return view('cajas.edit')
            ->with('caja', $caja)
            ->with('sucursales', $sucursales)
            ->with('timbrados', $timbrados)
        ;
    }

    public function update($id, Request $request){
        $request->validate([
            'nombre' => 'required|string',
            'sucursales_id' => 'integer|min:1',
            'timbrados_id' => 'integer|min:1',
            'expedicion_fiscal' => 'required|string'
        ]);

        $caj = Cajas::find($id);
        $caj->nombre = $request->nombre;
        $caj->sucursales_id = $request->sucursales_id;
        $caj->timbrados_id = $request->timbrados_id;
        $caj->expedicion_fiscal = $request->expedicion_fiscal;
        $caj->activo = $request->activo ? true : false;
        $caj->save();

        session()->flash('toastMensaje', 'Caja actualizada con éxito!');
        return redirect('/cajas');
    }
}
