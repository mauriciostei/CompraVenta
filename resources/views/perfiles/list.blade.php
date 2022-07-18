@extends('layouts.base')

@section('pagina')

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-start">
        <span class="align-self-center">
            <h5>Lista de perfiles</h5>
        </span>
        @can('perfiles-crear')
            <span>
                <a class="btn btn-primary" href="perfiles/create">
                    <i class="bi bi-plus"></i> Nuevo
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
                        <th>Activo</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($perfiles as $pe)
                        <tr>
                            <td class="align-middle"> {{$pe->nombre}} </td>
                            <td class="align-middle"> {{$pe->activo}} </td>
                            <td>
                                @can('perfiles-editar')
                                    <a class="btn align-self-center" href="perfiles/{{ $pe->id }}/edit">Editar</a>
                                @endcan
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-muted text-center">Sin perfiles en el sistema</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>

{{$perfiles->links()}}

@endsection