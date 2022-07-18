@extends('layouts.base')

@section('pagina')

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-start">
        <span class="align-self-center">
            <h5>Lista de productos</h5>
        </span>
        @can('depositos-crear')
            <span>
                <a class="btn btn-primary" href="productos/create">
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
                        <th>Costo unitario</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($productos as $prod)
                        <tr>
                            <td class="align-middle"> {{$prod->nombre}} </td>
                            <td class="align-middle"> {{number_format($prod->costo_unitario, 0)}} </td>
                            <td>
                                @can('productos-editar')
                                    <a class="btn align-self-center" href="productos/{{ $prod->id }}/edit">Editar</a>
                                @endcan
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-muted text-center">Sin productos en el sistema</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>

{{$productos->links()}}

@endsection