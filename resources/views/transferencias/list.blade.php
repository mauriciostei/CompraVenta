@extends('layouts.base')

@section('pagina')

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-start">
        <span class="align-self-center">
            <h5>Lista de Transferencias</h5>
        </span>
        @can('transferencias-crear')
            <span>
                <a class="btn btn-primary" href="transferencias/create">
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
                        <th>Fecha Hora</th>
                        <th>Deposito origen</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($transferencias as $tran)
                        <tr>
                            <td class="align-middle"> {{$tran->fecha_hora}} </td>
                            <td class="align-middle"> {{$tran->depositos->nombre}} </td>
                            <td></td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-muted text-center">Sin transferencias en el sistema</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>

{{$transferencias->links()}}

@endsection