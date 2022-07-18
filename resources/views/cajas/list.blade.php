@extends('layouts.base')

@section('pagina')

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-start">
        <span class="align-self-center">
            <h5>Lista de cajas</h5>
        </span>
        @can('cajas-crear')
            <span>
                <a class="btn btn-primary" href="cajas/create">
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
                        <th>Nombre</th>
                        <th>Sucursal</th>
                        <th>Timbrado</th>
                        <th>Estado</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($cajas as $caja)
                        <tr>
                            <td class="align-middle"> {{$caja->nombre}} </td>
                            <td class="align-middle"> {{$caja->sucursales->nombre}} </td>
                            <td class="align-middle"> {{$caja->timbrados->numero}} </td>
                            <td class="align-middle">
                                @if($caja->abierto)
                                    <span class="text-warning">Caja Abierta</span>
                                @else
                                    <span class="text-success">Caja Cerrada</span>
                                @endif
                            </td>
                            <td>
                                @can('cajas-editar')
                                <a class="btn align-self-center" href="cajas/{{ $caja->id }}/edit">Editar</a>
                                @endcan
                                @can('aperturas-ver')
                                    <a class="btn align-self-center" href="aperturas/{{ $caja->id }}/edit">Apertura</a>
                                @endcan
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-muted text-center">Sin cajas en el sistema</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>

{{$cajas->links()}}

@endsection