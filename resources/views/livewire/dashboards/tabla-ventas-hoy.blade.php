<div wire:poll.1s>
    
    <div class="card rounded-4 shadow">
        <div class="card-body">

            <div class="d-flex flex-row-reverse">
                <span class="text-muted">Ventas de hoy</span>
            </div>

            <div class="table-responsive">
                <table class="table table-hover table-sm">
                    <thead>
                        <tr>
                            <th>Cliente</th>
                            <th>Factura</th>
                            <th>Monto</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($ventas as $c)
                            <tr>
                                <td> {{$c->personas->nombre}} </td>
                                <td> {{number_format($c->numero_factura)}} </td>
                                <td> {{number_format($c->subTotal(), 0)}} </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">Sin ventas registradas</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $ventas->links() }}
            </div>

        </div>
    </div>

</div>
