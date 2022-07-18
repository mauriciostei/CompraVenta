<?php

namespace App\Http\Controllers;

use App\Models\Transferencias;
use Illuminate\Http\Request;

class TransferenciasController extends Controller
{
    public function index(){
        $transferencias = Transferencias::orderBy('id', 'desc')->paginate(10);
        return view('transferencias.list')->with('transferencias', $transferencias);
    }

    public function create(){
        return view('transferencias.create');
    }
}
