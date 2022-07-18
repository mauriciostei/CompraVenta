@extends('layouts.base')

@section('pagina')
    
<div class="row pt-4">
    <div class="col-1 col-lg-4"></div>
    <div class="col-10 col-lg-4">

        <div class="card mt-4">
            <div class="card-body">
        
                <h4 class="text-center mb-4">Ingreso al sistema</h4>
        
                <form method="POST" action="/login">
                    @csrf
        
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" placeholder="Correo" name="email"/>
                        <label>Correo Electronico</label>
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
        
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" placeholder="Contraseña" name="password" autocomplete="off"/>
                        <label>Contraseña de usuario</label>
                        @error('password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
        
                    <div class="mb-3 pt-3">
                        <input type="submit" value="ingresar" class="btn btn-primary w-100" />
                    </div>
        
                </form>
            </div>
        </div>

    </div>
    <div class="col-1 col-lg-4"></div>
</div>

@endsection