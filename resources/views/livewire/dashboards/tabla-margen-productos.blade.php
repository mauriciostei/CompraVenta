<div wire:poll.1s>
    
    <div class="card rounded-4 shadow">
        <div class="card-body">

            <div class="d-flex flex-row-reverse">
                <span class="text-muted">Margen de inventario</span>
            </div>

            <div class="table-responsive">
                <table class="table table-hover table-sm">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Costo Medio</th>
                            <th>Valor Venta</th>
                            <th>Margen (%)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($productos as $c)
                            <tr>
                                <td> {{$c->nombre}} </td>
                                <td> {{number_format($c->valorMedio())}} </td>
                                <td> {{number_format($c->valorReal())}} </td>
                                <td>
                                    @if($c->margen() <= 0)
                                        <span class="text-danger"> {{number_format($c->margen(),2)}}% </span>
                                    @else
                                        <span class="text-success"> {{number_format($c->margen(),2)}}% </span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">Sin productos registrados</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $productos->links() }}
            </div>

        </div>
    </div>

</div>
