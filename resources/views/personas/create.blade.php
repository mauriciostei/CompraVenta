@extends('layouts.base')

@section('pagina')

<form method="POST" action="/personas">
@csrf

    <div class="row">
        <div class="col"></div>
        <div class="col-12 col-lg-4">

            <div class="card">
                <div class="card-header">Crear Persona</div>
                <div class="card-body">
        
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" placeholder="Nombre" name="nombre"/>
                        <label>Nombre</label>
                        @error('nombre')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-9">
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" placeholder="Numero de documento" name="documento"/>
                                <label>Nª Documento</label>
                                @error('documento')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" placeholder="DV" name="digito_verificador"/>
                                <label>Nª DV</label>
                                @error('digito_verificador')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>


                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" name="cliente" >
                        <label class="form-check-label">Es Cliente?</label>
                    </div>

                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" name="proveedor" >
                        <label class="form-check-label">Es Proveedor?</label>
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