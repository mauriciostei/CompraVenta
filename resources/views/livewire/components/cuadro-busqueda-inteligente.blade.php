<div class="position-absolute top-0 start-50 p-3 z-index-2">
    @if($busqueda)
        <div class="card">
            <div class="card-header">
                <h5>Buscando: {{$busqueda}} </h5>
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-hover table-sm">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Documento</th>
                                <th>Es Cliente</th>
                                <th>Es Proveedor</th>
                                <th>Detalles</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($personas as $p)
                                <tr>
                                    <td class="align-middle"> {{$p->nombre}} </td>
                                    <td class="align-middle"> {{$p->documento}} </td>
                                    <td class="align-middle"> {{$p->cliente}} </td>
                                    <td class="align-middle"> {{$p->proveedor}} </td>
                                    <td>
                                        <a class="btn align-self-center" href="/personas/{{ $p->id }}">Ver</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted">No se encuentran personas con estos parámetros</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    @endif
</div>
