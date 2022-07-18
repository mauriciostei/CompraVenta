<?php

namespace App\Http\Livewire\Ventas;

use App\Models\Aperturas;
use App\Models\Depositos;
use App\Models\Inventarios;
use App\Models\Ivas;
use App\Models\Personas;
use App\Models\Productos;
use App\Models\Ventas;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Create extends Component
{
    public $venta;
    public $clientes;
    public $depositos;
    public $productos;
    public $ivas;
    public $aperturas;
    public $caja;
    public $timbrado;

    public $arrDetalle;
    public $subTotal = 0;

    public $today;

    protected $rules = [
        'venta.personas_id' => 'required|min:1',
        'venta.aperturas_id' => 'required|min:1',
        'venta.numero_factura' => 'required|integer|min:1',

        'arrDetalle' => 'required|array|min:1',
        'arrDetalle.*.productos_id' => 'required|integer|min:1',
        'arrDetalle.*.depositos_id' => 'required|integer|min:1',
        'arrDetalle.*.ivas_id' => 'required|integer|min:1',
        'arrDetalle.*.cantidad' => 'required|integer|min:1|lte:arrDetalle.*.existencia',
        'arrDetalle.*.precio' => 'required|integer|min:1',
        'arrDetalle.*.existencia' => 'required|integer|min:1',

        'today' => 'date|after_or_equal:timbrado.fecha_inicio|before_or_equal:timbrado.fecha_fin',
        'timbrado.factura_actual' => 'integer|before_or_equal:timbrado.factura_fin'
    ];

    protected $messages = [
        'arrDetalle.*.productos_id.required' => 'Productos sin asignar.',
        'arrDetalle.*.depositos_id.required' => 'Depósitos sin asignar.',
        'arrDetalle.*.ivas_id.required' => 'Impuestos sin asignar.',
        'arrDetalle.*.cantidad.min' => 'Cantidad no establecida.',
        'arrDetalle.*.cantidad.lte' => 'Cantidad no debe superar la existencia.',
        'arrDetalle.*.precio.min' => 'Precio no establecido.',
        'arrDetalle.*.existencia.min' => 'Producto no cuenta con existencia en el deposito seleccionado.',
        'today.after_or_equal' => 'Aun no se ha llegado a la fecha de inicio del timbrado',
        'today.before_or_equal' => 'Se ha superado la fecha de fin del timbrado',
        'timbrado.factura_actual.before_or_equal' => 'Factura actual ya no forma parte del timbrado',
    ];

    public function mount(){
        $this->venta = new Ventas();
        $this->clientes = Personas::where('cliente', true)->get();
        $this->depositos = Depositos::where('activo', true)->get();
        $this->productos = Productos::where('activo', true)->get();
        $this->ivas = Ivas::all();
        $this->aperturas = Aperturas::where('users_id', Auth::user()->id)->where('cierre', null)->get();

        $this->arrDetalle[] = ["productos_id" => null, "depositos_id" => null, 'ivas_id' => null, "cantidad" => 0, "precio" => 0, 'existencia' => 0];
        $this->today = date('Y-m-d');
    }

    public function agregarPunto(){
        $this->arrDetalle[] = ["productos_id" => null, "depositos_id" => null, 'ivas_id' => null, "cantidad" => 0, "precio" => 0, 'existencia' => 0];
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
    }

    public function selectCaja(){
        $ap =  Aperturas::find($this->venta->aperturas_id);
        $this->caja = $ap->cajas;
        $this->timbrado = $ap->cajas->timbrados;
        $this->venta->numero_factura = $this->timbrado->factura_actual;
        $this->validate();
    }

    public function selectProducto($index){
        $prd = Productos::find($this->arrDetalle[$index]['productos_id']);
        $this->arrDetalle[$index]['precio'] = $prd->costo_unitario;
        $this->obtenerExistencia($index);
    }

    public function obtenerExistencia($index){
        $res = Inventarios::where('productos_id', $this->arrDetalle[$index]['productos_id'])->where('depositos_id', $this->arrDetalle[$index]['depositos_id'])->first();
        if($res){
            $this->arrDetalle[$index]['existencia'] = $res->cantidad;
        }
        $this->validate();
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

        $this->venta->fecha_hora = now();
        $this->venta->users_id =  Auth::user()->id;
        $this->venta->save();
        $this->venta->productos()->attach($arr);

        $this->caja->monto_actual += $this->subTotal;
        $this->caja->save();

        $this->timbrado->factura_actual++;
        $this->timbrado->save();

        foreach($this->arrDetalle as $det){
            $res = Inventarios::where('productos_id', $det['productos_id'])->where('depositos_id', $det['depositos_id'])->first();
            $res->cantidad -= $det['cantidad'];
            $res->save();
        }

        session()->flash('toastMensaje', 'Venta realizada con éxito!');
        return redirect('/ventas');
    }

    public function render(){
        return view('livewire.ventas.create');
    }
}
