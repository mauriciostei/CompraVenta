<form wire:submit.prevent="save">
    
    <div class="row">
        <div class="col-12 col-lg-4">

            <div class="card">
                <div class="card-header">Cabecera de la venta</div>
                <div class="card-body">

                    <div class="form-floating mb-3">
                        <select class="form-control" wire:model="venta.personas_id">
                            <option selected disabled value="null">--Seleccione el Cliente--</option>
                            @foreach($clientes as $pro)
                                <option value="{{ $pro->id }}"> {{$pro->nombre}} </option>
                            @endforeach
                        </select>
                        <label>Cliente de la venta</label>
                        @error('venta.personas_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <select class="form-control" wire:model="venta.aperturas_id" wire:change="selectCaja">
                            <option selected disabled value="null">--Seleccione la Caja--</option>
                            @foreach($aperturas as $ap)
                                <option value="{{ $ap->id }}"> {{$ap->cajas->nombre}} </option>
                            @endforeach
                        </select>
                        <label>Caja para el ingreso</label>
                        @error('venta.aperturas_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col">Nª Timbrado:</div>
                        <div class="col">
                            @if($venta->aperturas_id !== null)
                                {{number_format($timbrado->numero, 0)}}
                            @else
                                0
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">Nª factura:</div>
                        <div class="col">
                            @if($venta->aperturas_id !== null)
                                {{number_format($venta->numero_factura, 0)}}
                            @else
                                0
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">Monto en caja:</div>
                        <div class="col">
                            @if($venta->aperturas_id !== null)
                                {{number_format($caja->monto_actual, 0)}}
                            @else
                                0
                            @endif
                            GS.
                        </div>
                    </div>

                    <div class="row">
                        @error('arrDetalle.*.productos_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        @error('arrDetalle.*.depositos_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        @error('arrDetalle.*.ivas_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        @error('arrDetalle.*.cantidad')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        @error('arrDetalle.*.precio')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        @error('arrDetalle.*.existencia')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        @error('venta.numero_factura')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror


                        @error('today')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        @error('timbrado.factura_actual')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                
                </div>
            </div>

        </div>


        <div class="col-12 col-lg-8">
            <div class="card">
                <div class="card-header">Detalle de la venta</div>
                <div class="card-body">

                    <table class="table table-responsive table-hover">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Deposito</th>
                                <th>Existencia</th>
                                <th>Cantidad</th>
                                <th>Precio</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($arrDetalle as $index => $puntosResult)

                                <tr>
                                    <td>
                                        <div class="form-floating mb-3">
                                            <select class="form-control" wire:model="arrDetalle.{{$index}}.productos_id" wire:change="selectProducto({{$index}})">
                                                <option selected disabled value="null">--Productos--</option>
                                                @foreach($productos as $pro)
                                                    <option value="{{ $pro->id }}"> {{$pro->nombre}} </option>
                                                @endforeach
                                            </select>
                                            <label>Producto</label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-floating mb-3">
                                            <select class="form-control" wire:model="arrDetalle.{{$index}}.depositos_id" wire:change="obtenerExistencia({{$index}})">
                                                <option selected disabled value="null">--Depósitos--</option>
                                                @foreach($depositos as $pro)
                                                    <option value="{{ $pro->id }}"> {{$pro->nombre}} </option>
                                                @endforeach
                                            </select>
                                            <label>Deposito</label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        {{number_format($arrDetalle[$index]['existencia'])}}
                                    </td>
                                    <td>
                                        <div class="form-floating mb-3">
                                            <input type="number" placeholder="cantidad" class="form-control" wire:model="arrDetalle.{{$index}}.cantidad" wire:change="calcular"/>
                                            <label>Cantidad</label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-floating mb-3">
                                            <input type="number" placeholder="precio" class="form-control" wire:model="arrDetalle.{{$index}}.precio" wire:change="calcular"/>
                                            <label>Precio</label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-floating mb-3">
                                            <select class="form-control" wire:model="arrDetalle.{{$index}}.ivas_id">
                                                <option selected disabled value="null">--Iva--</option>
                                                @foreach($ivas as $pro)
                                                    <option value="{{ $pro->id }}"> {{$pro->nombre}} </option>
                                                @endforeach
                                            </select>
                                            <label>Iva</label>
                                        </div>
                                    </td>
                                    <td>
                                        <button class="btn bg-light mt-3" wire:click.prevent="eliminarPunto({{$index}})"> 
                                            Eliminar
                                        </button>
                                    </td>
                                </tr>

                            @endforeach
                        </tbody>
                    </table>

                </div>
                <div class="card-footer d-flex justify-content-between align-items-start">
                    <span>
                        <button class="btn btn-primary" wire:click.prevent="agregarPunto">
                            <i class="bi bi-plus"></i> Añadir
                        </button>
                    </span>
                    <span class="align-self-center">
                        SubTotal: {{number_format($subTotal)}} GS.
                    </span>
                </div>
            </div>
        </div>

    </div>


    <button type="submit" class="btn btn-primary rounded-circle shadow position-absolute bottom-0 end-0 p-3 m-3 z-index-2">
        <i class="bi bi-box-arrow-down"></i>
    </button>

</form>