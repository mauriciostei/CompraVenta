<div wire:poll.1s>
    
    <div class="card rounded-4 shadow">
        <div class="card-body">

            <div class="d-flex flex-row-reverse">
                <span class="text-muted">Inventario Actual</span>
            </div>

            <div class="table-responsive">
                <table class="table table-hover table-sm">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Deposito</th>
                            <th>Sucursal</th>
                            <th>Cantidad</th>
                            <th>C. Quiebre</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($inventarioActual as $c)
                            <tr>
                                <td> {{$c->productos->nombre}} </td>
                                <td> {{$c->depositos->nombre}} </td>
                                <td> {{$c->depositos->sucursales->nombre}} </td>
                                <td> {{$c->cantidad}} </td>
                                <td>
                                    @if($c->cantidad < $c->productos->cantidad_quiebre)
                                        <span class="text-danger"> {{number_format( $c->productos->cantidad_quiebre - $c->cantidad , 0 )}} </span>
                                    @else
                                        <span class="text-success"> 0 </span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Sin inventario registrado</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $inventarioActual->links() }}
            </div>

        </div>
    </div>

</div>
