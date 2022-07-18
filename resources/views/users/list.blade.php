@extends('layouts.base')

@section('pagina')

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-start">
        <span class="align-self-center">
            <h5>Lista de usuarios</h5>
        </span>
        @can('usuarios-crear')
            <span>
                <a class="btn btn-primary" href="users/create">
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
                        <th>Correo</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $us)
                        <tr>
                            <td class="align-middle"> {{$us->name}} </td>
                            <td class="align-middle"> {{$us->email}} </td>
                            <td>
                                @can('usuarios-editar')
                                    <a class="btn align-self-center" href="users/{{ $us->id }}/edit">Editar</a>
                                @endcan
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-muted text-center">Sin usuarios en el sistema</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>


    </div>
</div>

{{$users->links()}}

@endsection