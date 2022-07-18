<?php

namespace App\Http\Controllers;

use App\Models\Aperturas;
use App\Models\Cajas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AperturasController extends Controller
{
    public function edit($id){
        $caja = Cajas::find($id);
        $historial = Aperturas::where('cajas_id', $id)->orderBy('id', 'desc')->paginate(10);

        return view('aperturas.edit')
            ->with('caja', $caja)
            ->with('historial', $historial)
        ;
    }

    public function update($id, Request $request){
        $caja = Cajas::find($id);
        $estado = 'abrió';

        if($caja->abierto){
            $apertura = Aperturas::where('cajas_id', $id)->where('cierre', null)->first();
            $apertura->cierre = now();
            $apertura->monto_cierre = $caja->monto_actual;
            $apertura->save();

            $caja->abierto = false;
            $caja->save();
            $estado = 'cerro';
        }else{
            $apertura = new Aperturas();
            $apertura->cajas_id = $caja->id;
            $apertura->users_id = Auth::user()->id;
            $apertura->monto_apertura = $caja->monto_actual;
            $apertura->save();

            $caja->abierto = true;
            $caja->save();
        }

        session()->flash('toastMensaje', 'Se '.$estado.' la caja '.$caja->nombre.'!');
        return redirect('/aperturas/'.$id.'/edit');
    }
}
