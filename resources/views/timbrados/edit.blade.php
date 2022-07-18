@extends('layouts.base')

@section('pagina')

<form method="POST" action="/timbrados/{{ $timbrado->id }}">
@method('PUT')
@csrf

    <div class="row">
        <div class="col"></div>
        <div class="col-12 col-lg-4">

            <div class="card">
                <div class="card-header">Crear Timbrado</div>
                <div class="card-body">
        
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" placeholder="Numero" name="numero" value="{{ $timbrado->numero }}"/>
                        <label>Numero</label>
                        @error('numero')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control" placeholder="Fecha de inicio" name="fecha_inicio"  value="{{ $timbrado->fecha_inicio }}"/>
                                <label>Fecha de inicio</label>
                                @error('fecha_inicio')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control" placeholder="Fecha de fin" name="fecha_fin"  value="{{ $timbrado->fecha_fin }}"/>
                                <label>Fecha de fin</label>
                                @error('fecha_fin')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" placeholder="Nª factura inicial" name="factura_inicio"  value="{{ $timbrado->factura_inicio }}"/>
                                <label>Nª factura inicial</label>
                                @error('factura_inicio')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" placeholder="Nª factura final" name="factura_fin"  value="{{ $timbrado->factura_fin }}"/>
                                <label>Nª factura final</label>
                                @error('factura_fin')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">Factura Actual:</div>
                        <div class="col"> {{number_format($timbrado->factura_actual, 0)}} </div>
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