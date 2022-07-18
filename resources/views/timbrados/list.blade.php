@extends('layouts.base')

@section('pagina')

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-start">
        <span class="align-self-center">
            <h5>Lista de timbrados</h5>
        </span>
        @can('timbrados-crear')
            <span>
                <a class="btn btn-primary" href="timbrados/create">
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
                        <th>Numero</th>
                        <th>Factura Actual</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($timbrados as $tim)
                        <tr>
                            <td class="align-middle"> {{number_format($tim->numero,0)}} </td>
                            <td class="align-middle"> {{number_format($tim->factura_actual)}} </td>
                            <td>
                                @can('timbrados-editar')
                                    <a class="btn align-self-center" href="timbrados/{{ $tim->id }}/edit">Editar</a>
                                @endcan
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-muted text-center">Sin timbrados en el sistema</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>

{{$timbrados->links()}}

@endsection