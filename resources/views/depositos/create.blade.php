@extends('layouts.base')

@section('pagina')

<form method="POST" action="/depositos">
@csrf

    <div class="row">
        <div class="col"></div>
        <div class="col-12 col-lg-4">

            <div class="card">
                <div class="card-header">Crear Deposito</div>
                <div class="card-body">
        
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" placeholder="Nombre" name="nombre"/>
                        <label>Nombre</label>
                        @error('nombre')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <select name="sucursales_id" class="form-control">
                            <option selected disabled>--Seleccione la sucursal--</option>
                            @foreach($sucursales as $suc)
                                <option value="{{ $suc->id }}"> {{$suc->nombre}} </option>
                            @endforeach
                        </select>
                        <label>Sucursal</label>
                        @error('sucursales_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
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