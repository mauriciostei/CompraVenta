@extends('layouts.base')

@section('pagina')

<div class="row">
    <div class="col"></div>
    <div class="col-12 col-lg-6">

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-start">
                <span>
                    {{$caja->nombre}}
                </span>
                <span>
                    @if($caja->abierto)
                        <span class="text-bold text-warning">Caja Abierta</span>
                    @else
                        <span class="text-bold text-success">Caja Cerrada</span>
                    @endif
                </span>
            </div>
            <div class="card-body">

                <table class="table table-responsive table-hover">
                    <tr>
                        <th>Sucursal:</th>
                        <td> {{$caja->sucursales->nombre}} </td>
                    </tr>
                    <tr>
                        <th>Timbrado:</th>
                        <td> {{$caja->timbrados->numero}} </td>
                    </tr>
                    <tr>
                        <th>Monto actual:</th>
                        <td> {{number_format($caja->monto_actual, 0)}} </td>
                    </tr>
                    <tr>
                        <th>Proxima factura:</th>
                        <td> {{number_format($caja->timbrados->factura_actual, 0)}} </td>
                    </tr>
                </table>
            </div>
        </div>

    </div>
    <div class="col"></div>
</div>

<div class="row pt-3">
    <div class="col"></div>
    <div class="col-12 col-lg-6">

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-start">
                <span class="align-self-center">
                    Historial de Caja
                </span>
                @canany(['aperturas-editar', 'aperturas-crear'])
                    <span>
                        <form method="POST" action="/aperturas/{{ $caja->id }}">
                            @method('PUT')
                            @csrf
                            @if($caja->abierto)
                                {{-- @can('cerrar-caja', Auth::user(), $caja->id) --}}
                                    <input type="submit" class="btn btn-primary" value="Cerrar Caja">
                                {{-- @endcan --}}
                            @else
                                <input type="submit" class="btn btn-primary" value="Abrir Caja">
                            @endif
                        </form>
                    </span>
                @endcanany
            </div>
            <div class="card-body">

                <table class="table table-responsive table-hover">
                    <thead>
                        <tr>
                            <th>Nª</th>
                            <th>Usuario</th>
                            <th>Fecha Apertura</th>
                            <th>Fecha Cierre</th>
                            <th>Monto Apertura</th>
                            <th>Monto Cierre</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($historial as $h)
                            <tr>
                                <td> {{$h->id}} </td>
                                <td> {{$h->users->name}} </td>
                                <td> {{$h->apertura}} </td>
                                <td> {{$h->cierre}} </td>
                                <td> {{number_format($h->monto_apertura)}} </td>
                                <td> {{number_format($h->monto_cierre)}} </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted">Sin aperturas aun!</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{$historial->links()}}
            </div>
        </div>

    </div>
    <div class="col"></div>
</div>

@endsection