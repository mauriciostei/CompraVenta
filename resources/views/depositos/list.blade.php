@extends('layouts.base')

@section('pagina')

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-start">
        <span class="align-self-center">
            <h5>Lista de depósitos</h5>
        </span>
        @can('depositos-crear')
            <span>
                <a class="btn btn-primary" href="depositos/create">
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
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($depositos as $dep)
                        <tr>
                            <td class="align-middle"> {{$dep->nombre}} </td>
                            <td class="align-middle"> {{$dep->sucursales->nombre}} </td>
                            <td>
                                @can('depositos-editar')
                                    <a class="btn align-self-center" href="depositos/{{ $dep->id }}/edit">Editar</a>
                                @endcan
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-muted text-center">Sin depósitos en el sistema</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>


    </div>
</div>

{{$depositos->links()}}

@endsection