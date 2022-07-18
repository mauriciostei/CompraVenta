<?php

namespace App\Http\Livewire\Compras;

use App\Models\Aperturas;
use App\Models\Cajas;
use App\Models\Compras;
use App\Models\Depositos;
use App\Models\Inventarios;
use App\Models\Ivas;
use App\Models\Personas;
use App\Models\Productos;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Create extends Component
{
    public $compra;
    public $proveedores;
    public $depositos;
    public $productos;
    public $ivas;
    public $aperturas;
    public $caja;

    public $arrDetalle;
    public $subTotal = 0;
    public $puedoGuardar = false;

    protected $rules = [
        'compra.personas_id' => 'required|min:1',
        'compra.aperturas_id' => 'required|min:1',
        'compra.numero_factura' => 'required|integer|min:1',

        'arrDetalle' => 'required|array|min:1',
        'arrDetalle.*.productos_id' => 'required|integer|min:1',
        'arrDetalle.*.depositos_id' => 'required|integer|min:1',
        'arrDetalle.*.ivas_id' => 'required|integer|min:1',
        'arrDetalle.*.cantidad' => 'required|integer|min:1',
        'arrDetalle.*.precio' => 'required|integer|min:1',
    ];

    protected $messages = [
        'arrDetalle.*.productos_id.required' => 'Productos sin asignar.',
        'arrDetalle.*.depositos_id.required' => 'Depósitos sin asignar.',
        'arrDetalle.*.ivas_id.required' => 'Impuestos sin asignar.',
        'arrDetalle.*.cantidad.min' => 'Cantidad no establecida.',
        'arrDetalle.*.precio.min' => 'Precio no establecido.',
    ];

    public function mount(){
        $this->compra = new Compras();
        $this->proveedores = Personas::where('proveedor', true)->get();
        $this->depositos = Depositos::where('activo', true)->get();
        $this->productos = Productos::where('activo', true)->get();
        $this->ivas = Ivas::all();
        $this->aperturas = Aperturas::where('users_id', Auth::user()->id)->where('cierre', null)->get();

        $this->arrDetalle[] = ["productos_id" => null, "depositos_id" => null, "ivas_id" => null, "cantidad" => 0, "precio" => 0];
    }

    public function agregarPunto(){
        $this->arrDetalle[] = ["productos_id" => null, "depositos_id" => null, "ivas_id" => null, "cantidad" => 0, "precio" => 0];
        $this->calcular();
    }

    public function eliminarPunto($index){
        unset($this->arrDetalle[$index]);
        $this->arrDetalle = array_values($this->arrDetalle);
        $this->calcular();
    }

    public function calcular(){
        $this->subTotal = 0;
        foreach($this->arrDetalle as $det){
            $linea = $det["cantidad"] * $det["precio"];
            $this->subTotal += $linea;
        }
        $this->validaMonto();
    }

    public function selectCaja(){
        $ap =  Aperturas::find($this->compra->aperturas_id);
        $this->caja = $ap->cajas;
        $this->validaMonto();
    }

    public function validaMonto(){
        if($this->caja == null || $this->subTotal == 0){
            $this->puedoGuardar = false;
            return null;
        }

        if($this->caja->monto_actual <= $this->subTotal){
            $this->puedoGuardar = false;
            return null;
        }else{
            $this->puedoGuardar = true;
            return null;
        }
    }

    public function updated($value){
        $this->validate();
    }

    public function save(){
        $this->validate();

        $arr = [];
        foreach($this->arrDetalle as $det){
            $arr[$det['productos_id']] = array('depositos_id' => $det['depositos_id'], 'ivas_id' => $det['ivas_id'], 'cantidad' => $det['cantidad'], 'precio' => $det['precio']);
        }

        $this->compra->fecha_hora = now();
        $this->compra->save();
        $this->compra->productos()->attach($arr);

        $this->caja->monto_actual -= $this->subTotal;
        $this->caja->save();

        foreach($this->arrDetalle as $det){
            $res = Inventarios::where('productos_id', $det['productos_id'])->where('depositos_id', $det['depositos_id'])->first();
            if($res){
                $res->cantidad += $det['cantidad'];
            }else{
                $res = new Inventarios();
                $res->productos_id = $det['productos_id'];
                $res->depositos_id = $det['depositos_id'];
                $res->cantidad = $det['cantidad'];
            }
            $res->save();

            $prd = Productos::find($det['productos_id']);
            $prd->costo_ultima_compra = $det['precio'];
            $prd->costo_promedio = ($prd->costo_promedio == 0) ? $det['precio'] : ($prd->costo_promedio + $det['precio']) / 2;
            $prd->save();
        }

        session()->flash('toastMensaje', 'Compra realizada con éxito!');
        return redirect('/compras');
    }

    public function render(){
        return view('livewire.compras.create');
    }
}
