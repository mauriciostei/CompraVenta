@extends('layouts.base')

@section('pagina')

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-start">
        <span class="align-self-center">
            <h5>Lista de ivas</h5>
        </span>
        @can('impuestos-crear')
            <span>
                <a class="btn btn-primary" href="ivas/create">
                    <i class="bi bi-plus"></i> Nueva
                </a>
            </span>
        @endcan
    </div>
    <div class="card-body">

        {{-- <ul class="list-group">
            
            @forelse($ivas as $i)
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div>
                        <div class="fw-bold">{{$i->nombre}}</div>
                        <small> {{$i->multiplo}} </small>
                    </div>
                    <div>
                        @can('impuestos-editar')
                            <a class="btn align-self-center" href="ivas/{{ $i->id }}/edit">Editar</a>
                        @endcan
                    </div>
                </li>
            @empty
                <li class="list-group-item">Sin ivas en el sistema</li>
            @endforelse
        </ul> --}}

        <div class="table-responsive">
            <table class="table table-responsive table-hover table-sm">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Múltiplo</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($ivas as $i)
                        <tr>
                            <td class="align-middle"> {{$i->nombre}} </td>
                            <td class="align-middle"> {{$i->multiplo}} </td>
                            <td>
                                @can('impuestos-editar')
                                    <a class="btn align-self-center" href="ivas/{{ $i->id }}/edit">Editar</a>
                                @endcan
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-muted text-center">Sin ivas en el sistema</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>

{{$ivas->links()}}

@endsection