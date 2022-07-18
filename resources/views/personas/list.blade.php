@extends('layouts.base')

@section('pagina')

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-start">
        <span class="align-self-center">
            <h5>Lista de Personas</h5>
        </span>
        @canany(['proveedores-crear', 'clientes-crear'])
            <span>
                <a class="btn btn-primary" href="personas/create">
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
                        <th>Documento</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($personas as $per)
                        <tr>
                            <td class="align-middle"> {{$per->nombre}} </td>
                            <td class="align-middle"> {{$per->documento}} </td>
                            <td>
                                @canany(['proveedores-editar', 'clientes-editar'])
                                    <a class="btn align-self-center" href="personas/{{ $per->id }}/edit">Editar</a>
                                @endcan
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-muted text-center">Sin personas en el sistema</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>


    </div>
</div>

{{$personas->links()}}

@endsection