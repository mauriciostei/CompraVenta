@extends('layouts.base')

@section('pagina')

<form method="POST" action="/productos/{{ $producto->id }}">
@method('PUT')
@csrf

    <div class="row">
        <div class="col"></div>
        <div class="col-12 col-lg-4">

            <div class="card">
                <div class="card-header">Editar Producto</div>
                <div class="card-body">
        
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" placeholder="Nombre" name="nombre" value="{{ $producto->nombre }}"/>
                        <label>Nombre</label>
                        @error('nombre')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" placeholder="Costo" name="costo_unitario" value="{{ $producto->costo_unitario }}"/>
                        <label>Costo Unitario</label>
                        @error('costo_unitario')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" placeholder="cantidad" name="cantidad_quiebre" value="{{ $producto->cantidad_quiebre }}"/>
                        <label>Cantidad para el Quiebre</label>
                        @error('cantidad_quiebre')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" name="activo" value="true" {{ ($producto->activo) ? 'checked' : '' }} >
                        <label class="form-check-label">Activo</label>
                    </div>

                    <div class="row">
                        <div class="col">Costo Medio:</div>
                        <div class="col"> {{number_format($producto->costo_promedio)}} GS. </div>
                    </div>
                    <div class="row">
                        <div class="col">Costo Ultima Compra:</div>
                        <div class="col"> {{number_format($producto->costo_ultima_compra)}} GS. </div>
                    </div>
                    
                </div>
            </div>

        </div>

        <div class="col"></div>
    </div>

    


    <button type="submit" class="btn btn-primary rounded-circle shadow position-absolute bottom-0 end-0 p-3 m-3 z-index-2">
        <i class="bi bi-box-arrow-down"></i>
    </button>

</form>

@endsection