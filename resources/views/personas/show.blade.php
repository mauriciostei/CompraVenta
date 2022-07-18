@extends('layouts.base')

@section('pagina')

<div class="row">
    <div class="col"></div>
    <div class="col-12 col-lg-6">
        <div class="card">
            <div class="card-header">
                <h5>{{ $persona->nombre }}</h5>
            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col">Código interno</div>
                    <div class="col"> {{$persona->id}} </div>
                </div>
                <div class="row">
                    <div class="col">Nombre</div>
                    <div class="col"> {{$persona->nombre}} </div>
                </div>
                <div class="row">
                    <div class="col">Documento</div>
                    <div class="col"> {{number_format($persona->documento, 0)}} </div>
                </div>
                <div class="row">
                    <div class="col">DV</div>
                    <div class="col"> {{$persona->digito_verificador}} </div>
                </div>
                <div class="row">
                    <div class="col">Es Cliente</div>
                    <div class="col">
                        @if($persona->cliente)
                            <span class="text-success">Si</span>
                        @else
                            <span class="text-warning">no</span>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col">Es Proveedor</div>
                    <div class="col">
                        @if($persona->proveedor)
                            <span class="text-success">Si</span>
                        @else
                            <span class="text-warning">no</span>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="col"></div>
</div>

<div class="row pt-3">
    <div class="col-12 col-lg-6">

        <div class="card rounded-3 shadow">
            <div class="card-body text-center">
    
                <div class="d-flex flex-row-reverse">
                    <span class="text-muted">Ventas</span>
                </div>
    
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Caja</th>
                                <th>Fecha y Hora</th>
                                <th>Nª Factura</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($ventas as $v)
                                <tr>
                                    <td> {{$v->aperturas->cajas->nombre}} </td>
                                    <td> {{$v->fecha_hora}} </td>
                                    <td> {{$v->numero_factura}} </td>
                                    <td> {{number_format($v->subTotal(), 0)}} </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-muted text-center">Aun no se han realizado ventas</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
    
            </div>
        </div>

    </div>
    <div class="col-12 col-lg-6 pt-3 pt-lg-0">

        <div class="card rounded-3 shadow">
            <div class="card-body text-center">
    
                <div class="d-flex flex-row-reverse">
                    <span class="text-muted">Compras</span>
                </div>
    
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Caja</th>
                                <th>Fecha y Hora</th>
                                <th>Nª Factura</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($compras as $v)
                                <tr>
                                    <td> {{$v->aperturas->cajas->nombre}} </td>
                                    <td> {{$v->fecha_hora}} </td>
                                    <td> {{$v->numero_factura}} </td>
                                    <td> {{number_format($v->subTotal(), 0)}} </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-muted text-center">Aun no se han realizado ventas</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
    
            </div>
        </div>

    </div>
</div>

@endsection