@extends('layouts.base')

@section('pagina')

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-start">
        <span class="align-self-center">
            <h5>Lista de sucursales</h5>
        </span>
        @can('sucursales-crear')
            <span>
                <a class="btn btn-primary" href="sucursales/create">
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
                        <th>Teléfono</th>
                        <th>Activo</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($sucursales as $suc)
                        <tr>
                            <td class="align-middle"> {{$suc->nombre}} </td>
                            <td class="align-middle"> {{number_format($suc->telefono, 0)}} </td>
                            <td class="align-middle"> {{$suc->activo}} </td>
                            <td>
                                @can('sucursales-editar')
                                    <a class="btn align-self-center" href="sucursales/{{ $suc->id }}/edit">Editar</a>
                                @endcan
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-muted text-center">Sin sucursales en el sistema</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>

{{$sucursales->links()}}

@endsection