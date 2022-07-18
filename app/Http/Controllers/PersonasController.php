<?php

namespace App\Http\Controllers;

use App\Models\Compras;
use App\Models\Personas;
use App\Models\Ventas;
use Illuminate\Http\Request;

class PersonasController extends Controller
{
    public function index(){
        $personas = Personas::paginate(10);
        return view('personas.list')->with('personas', $personas);
    }

    public function create(){
        return view('personas.create');
    }

    public function store(Request $request){
        $request->validate([
            'nombre' => 'required|string|min:5',
            'documento' => 'required|integer'
        ]);

        $pe = new Personas();
        $pe->nombre = $request->nombre;
        $pe->documento = $request->documento;
        $pe->digito_verificador = $request->digito_verificador;
        $pe->cliente = $request->cliente ? true : false;
        $pe->proveedor = $request->proveedor ? true : false;
        $pe->save();

        session()->flash('toastMensaje', 'Persona creada con éxito!');
        return redirect('/personas');
    }

    public function edit($id){
        $persona = Personas::find($id);
        return view('personas.edit')->with('persona', $persona);
    }

    public function update($id, Request $request){
        $request->validate([
            'nombre' => 'required|string|min:5',
            'documento' => 'required|integer'
        ]);

        $pe = Personas::find($id);
        $pe->nombre = $request->nombre;
        $pe->documento = $request->documento;
        $pe->digito_verificador = $request->digito_verificador;
        $pe->cliente = $request->cliente ? true : false;
        $pe->proveedor = $request->proveedor ? true : false;
        $pe->save();

        session()->flash('toastMensaje', 'Persona actualizada con éxito!');
        return redirect('/personas');
    }

    public function show($id){
        $persona = Personas::find($id);

        $ventas = Ventas::where('personas_id', $persona->id)->orderBy('fecha_hora', 'desc')->paginate(5);
        $compras = Compras::where('personas_id', $persona->id)->orderBy('fecha_hora', 'desc')->paginate(5);

        return view('personas.show')
            ->with('persona', $persona)
            ->with('ventas', $ventas)
            ->with('compras', $compras)
        ;
    }
}
