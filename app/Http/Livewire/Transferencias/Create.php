<?php

namespace App\Http\Livewire\Transferencias;

use App\Models\Depositos;
use App\Models\Inventarios;
use App\Models\Productos;
use App\Models\Transferencias;
use Livewire\Component;

class Create extends Component
{
    public $productos;
    public $depositos;
    public $inventario;

    public $arrDetalle;
    public $transferencia;

    protected $rules = [
        'transferencia.depositos_id' => 'required|integer|min:1',

        'arrDetalle' => 'required|array|min:1',
        'arrDetalle.*.productos_id' => 'required|integer|min:1',
        'arrDetalle.*.depositos_id' => 'required|integer|min:1',
        'arrDetalle.*.cantidad' => 'required|integer|min:1|lte:arrDetalle.*.inventario',
        'arrDetalle.*.inventario' => 'required|integer|min:1',
    ];

    protected $messages = [
        'arrDetalle.*.productos_id.required' => 'Productos sin asignar.',
        'arrDetalle.*.depositos_id.required' => 'Depósitos sin asignar.',
        'arrDetalle.*.cantidad.min' => 'Cantidad no establecida.',
        'arrDetalle.*.inventario.min' => 'Inventario no establecido.',
        'arrDetalle.*.cantidad.lte' => 'Cantidad no debe superar el inventario.',
    ];

    public function mount(){
        $this->productos = Productos::all();
        $this->depositos = Depositos::all();
        $this->inventario = Inventarios::all();
        $this->transferencia = new Transferencias();
        $this->transferencia->depositos_id = 1;

        $this->arrDetalle[] = ["productos_id" => null, "depositos_id" => null, "cantidad" => 0, 'inventario' => 0];
    }

    public function agregarPunto(){
        $this->arrDetalle[] = ["productos_id" => null, "depositos_id" => null, "cantidad" => 0, 'inventario' => 0];
    }

    public function updateOrigen(){
        foreach($this->arrDetalle as $index => $contenido){
            $this->buscarExistencia($index);
        }
    }

    public function buscarExistencia($index){
        $prd = $this->arrDetalle[$index]['productos_id'];
        $inv = Inventarios::where('productos_id', $prd)->where('depositos_id', $this->transferencia->depositos_id)->first();
        if($inv){
            $this->arrDetalle[$index]['inventario'] = $inv->cantidad;
        }else{
            $this->arrDetalle[$index]['inventario'] = 0;
        }
    }

    public function eliminarPunto($index){
        unset($this->arrDetalle[$index]);
        $this->arrDetalle = array_values($this->arrDetalle);
    }

    public function render(){
        return view('livewire.transferencias.create');
    }

    public function updated(){
        $this->validate();
    }

    public function save(){
        $this->validate();

        $arr = [];
        foreach($this->arrDetalle as $det){
            $arr[$det['productos_id']] = array('depositos_id' => $det['depositos_id'], 'cantidad' => $det['cantidad']);
        }

        $this->transferencia->fecha_hora = now();
        $this->transferencia->save();
        $this->transferencia->productos()->attach($arr);

        foreach($this->arrDetalle as $det){
            $origen = Inventarios::where('productos_id', $det['productos_id'])->where('depositos_id', $this->transferencia->depositos_id)->first();
            $origen->cantidad -= $det['cantidad'];
            $origen->save();

            $destino = Inventarios::where('productos_id', $det['productos_id'])->where('depositos_id', $det['depositos_id'])->first();
            if($destino){
                $destino->cantidad += $det['cantidad'];
            }else{
                $destino = new Inventarios();
                $destino->productos_id = $det['productos_id'];
                $destino->depositos_id = $det['depositos_id'];
                $destino->cantidad = $det['cantidad'];
            }
            $destino->save();
        }

        session()->flash('toastMensaje', 'Transferencia realizada con éxito!');
        return redirect('/transferencias');
    }
}
