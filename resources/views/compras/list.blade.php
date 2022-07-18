@extends('layouts.base')

@section('pagina')

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-start">
        <span class="align-self-center">
            <h5>Lista de Compras</h5>
        </span>
        @can('compras-crear')
            <span>
                <a class="btn btn-primary" href="compras/create">
                    <i class="bi bi-plus"></i> Nueva
                </a>
            </span>
        @endcan
    </div>
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-responsive table-hover table-sm">
                <thead>
                    <tr>
                        <th>Proveedor</th>
                        <th>Numero de factura</th>
                        <th>Fecha y hora</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($compras as $comp)
                        <tr>
                            <td class="align-middle"> {{$comp->personas->nombre}} </td>
                            <td class="align-middle"> {{$comp->numero_factura}} </td>
                            <td class="align-middle"> {{$comp->fecha_hora}} </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-muted text-center">Sin compras en el sistema</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>

{{$compras->links()}}

@endsection