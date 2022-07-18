<?php

namespace App\Http\Controllers;

use App\Models\Compras;
use Illuminate\Http\Request;

class ComprasController extends Controller
{
    public function index(){
        $compras = Compras::orderBy('id', 'desc')->paginate(10);
        return view('compras.list')->with('compras', $compras);
    }

    public function create(){
        return view('compras.create');
    }
}
