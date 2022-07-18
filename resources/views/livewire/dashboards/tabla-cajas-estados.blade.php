<div wire:poll.1s>
    
    <div class="card rounded-4 shadow">
        <div class="card-body">

            <div class="d-flex flex-row-reverse">
                <span class="text-muted">Estado de Cajas</span>
            </div>

            <div class="table-responsive">
                <table class="table table-hover table-sm">
                    <thead>
                        <tr>
                            <th>Caja</th>
                            <th>Sucursal</th>
                            <th>Estado</th>
                            <th>Monto Actual</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($cajas as $c)
                            <tr>
                                <td> {{$c->nombre}} </td>
                                <td> {{$c->sucursales->nombre}} </td>
                                <td>
                                    @if($c->abierto)
                                        <span class="text-warning">Caja Abierta</span>
                                    @else
                                        <span class="text-success">Caja Cerrada</span>
                                    @endif
                                </td>
                                <td> {{number_format($c->monto_actual)}} GS. </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center">Sin cajas registradas</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $cajas->links() }}
            </div>

        </div>
    </div>

</div>
