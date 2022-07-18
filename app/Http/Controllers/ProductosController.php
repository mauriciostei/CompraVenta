<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    public function index(){
        $productos = Productos::paginate(10);
        return view('productos.list')->with('productos', $productos);
    }

    public function create(){
        return view('productos.create');
    }

    public function store(Request $request){
        $request->validate([
            'nombre' => 'required|string|min:4',
            'costo_unitario' => 'required|integer|min:1000',
            'cantidad_quiebre' => 'required|integer|min:1',
        ]);

        $prd = new Productos();
        $prd->nombre = $request->nombre;
        $prd->costo_unitario = $request->costo_unitario;
        $prd->cantidad_quiebre = $request->cantidad_quiebre;
        $prd->save();

        session()->flash('toastMensaje', 'Producto creado con éxito!');
        return redirect('/productos');
    }

    public function edit($id){
        $producto = Productos::find($id);
        return view('productos.edit')->with('producto', $producto);
    }

    public function update($id, Request $request){
        $request->validate([
            'nombre' => 'required|string|min:4',
            'costo_unitario' => 'required|integer|min:1000',
            'cantidad_quiebre' => 'required|integer|min:1',
        ]);

        $prd = Productos::find($id);
        $prd->nombre = $request->nombre;
        $prd->costo_unitario = $request->costo_unitario;
        $prd->cantidad_quiebre = $request->cantidad_quiebre;
        $prd->activo = $request->activo ? true : false;
        $prd->save();

        session()->flash('toastMensaje', 'Producto actualizado con éxito!');
        return redirect('/productos');
    }
}
