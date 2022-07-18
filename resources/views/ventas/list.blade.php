@extends('layouts.base')

@section('pagina')

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-start">
        <span class="align-self-center">
            <h5>Lista de Ventas</h5>
        </span>
        @can('ventas-crear')
            <span>
                <a class="btn btn-primary" href="ventas/create">
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
                        <th>Cliente</th>
                        <th>Numero de factura</th>
                        <th>Fecha y hora</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($ventas as $ven)
                        <tr>
                            <td class="align-middle"> {{$ven->personas->nombre}} </td>
                            <td class="align-middle"> {{$ven->numero_factura}} </td>
                            <td class="align-middle"> {{$ven->fecha_hora}} </td>
                            <td>
                                <a class="btn align-self-center" href="imprimirFactura/{{ $ven->id }}" target="__blank">Imprimir</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-muted text-center">Sin ventas en el sistema<</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>


    </div>
</div>

{{$ventas->links()}}

@endsection