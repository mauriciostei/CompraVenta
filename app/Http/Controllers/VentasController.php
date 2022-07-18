<?php

namespace App\Http\Controllers;

use App\Models\Ventas;
use Illuminate\Http\Request;
use PDF;

class VentasController extends Controller
{
    public function index(){
        $ventas = Ventas::orderBy('id', 'desc')->paginate(10);
        return view('ventas.list')->with('ventas', $ventas);
    }

    public function create(){
        return view('ventas.create');
    }

    public function imprimirFactura($id){
        $ven = Ventas::find($id);
        $pdf = PDF::loadView('ventas.autoImpreso', [
            'venta' => $ven
        ]);

        return $pdf->stream();
    }
}
