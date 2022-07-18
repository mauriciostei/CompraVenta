@extends('layouts.base')

@section('pagina')

<div class="row d-flex">
    <div class="col-6 col-lg-2">
        @livewire('dashboards.card-compras-total-hoy')
    </div>
    <div class="col-6 col-lg-2">
        @livewire('dashboards.card-ventas-total-hoy')
    </div>
    <div class="col-6 col-lg-2 pt-2 pt-lg-0">
        @livewire('dashboards.card-cajas-actual')
    </div>
    <div class="col-6 col-lg-2 pt-2 pt-lg-0">
        @livewire('dashboards.card-costo-inventario-actual')
    </div>
    <div class="col-6 col-lg-2 pt-2 pt-lg-0">
        @livewire('dashboards.card-venta-inventario-actual')
    </div>
    <div class="col-6 col-lg-2 pt-2 pt-lg-0">
        @livewire('dashboards.card-costo-quiebre')
    </div>
</div>

<div class="row pt-3">
    <div class="col-12 col-lg-6 pt-2">
        @livewire('dashboards.tabla-cajas-estados')
    </div>
    <div class="col-12 col-lg-6 pt-2">
        @livewire('dashboards.tabla-inventario-actual')
    </div>
</div>

<div class="row pt-3">
    <div class="col-12 col-lg-6 pt-2">
        @livewire('dashboards.tabla-ventas-hoy')
    </div>
    <div class="col-12 col-lg-6 pt-2">
        @livewire('dashboards.tabla-margen-productos')
    </div>
</div>



@endsection