<form wire:submit.prevent="save">
    
    <div class="row">
        <div class="col"></div>
        <div class="col-12 col-lg-10">

            <div class="card">
                <div class="card-header">
                    <h4>Nueva transferencia</h4>
                </div>
                <div class="card-body">

                    <div class="form-floating mb-3">
                        <select class="form-control" wire:model="transferencia.depositos_id" wire:change="updateOrigen">
                            @foreach($depositos as $pro)
                                <option value="{{ $pro->id }}"> {{$pro->nombre}} </option>
                            @endforeach
                        </select>
                        <label>Deposito Origen</label>
                    </div>
                    @error('transferencia.depositos_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    @error('arrDetalle.*.productos_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    @error('arrDetalle.*.depositos_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    @error('arrDetalle.*.cantidad')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    @error('arrDetalle.*.inventario')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">Producto</th>
                                <th class="text-center">Cantidad (a mover)</th>
                                <th class="text-center">Existencia</th>
                                <th class="text-center">Deposito (destino)</th>
                                <th class="text-center"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($arrDetalle as $index => $puntosResult)
                                <tr>
                                    <td>
                                        <div class="form-floating mb-3">
                                            <select class="form-control" wire:model="arrDetalle.{{$index}}.productos_id" wire:change="buscarExistencia({{$index}})">
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
                                            <input type="number" placeholder="cantidad" class="form-control" wire:model="arrDetalle.{{$index}}.cantidad"/>
                                            <label>Cantidad</label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        {{number_format($arrDetalle[$index]['inventario'])}}
                                    </td>
                                    <td>
                                        <div class="form-floating mb-3">
                                            <select class="form-control" wire:model="arrDetalle.{{$index}}.depositos_id">
                                                <option selected disabled value="null">--Depósitos--</option>
                                                @foreach($depositos as $pro)
                                                    <option value="{{ $pro->id }}"> {{$pro->nombre}} </option>
                                                @endforeach
                                            </select>
                                            <label>Deposito</label>
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

                <div class="card-footer">
                    <button class="btn btn-primary" wire:click.prevent="agregarPunto">
                        <i class="bi bi-plus"></i> Añadir
                    </button>
                </div>

            </div>

        </div>
        <div class="col"></div>
    </div>

    <button type="submit" class="btn btn-primary rounded-circle shadow position-absolute bottom-0 end-0 p-3 m-3 z-index-2">
        <i class="bi bi-box-arrow-down"></i>
    </button>

</form>