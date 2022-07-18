@extends('layouts.base')

@section('pagina')

<form method="POST" action="/users">
@csrf

    <div class="row">
        <div class="col"></div>
        <div class="col-12 col-lg-4">

            <div class="card">
                <div class="card-header">Crear Usuario</div>
                <div class="card-body">
        
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" placeholder="Nombre" name="name"/>
                        <label>Nombre</label>
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" placeholder="Correo" name="email"/>
                        <label>Correo Electronico</label>
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
        
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" placeholder="password" name="password" autocomplete="off"/>
                        <label>Contraseña</label>
                        @error('password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    
                </div>
            </div>

        </div>

        <div class="col-12 col-lg-4">

            <div class="card">
                <div class="card-header">Perfiles del usuario</div>
                <div class="card-body">

                    <ul class="list-group">
                        @forelse($perfiles as $pe)
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div>
                                    {{$pe->nombre}}
                                </div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" name="perfiles[]" value="{{$pe->id}}">
                                </div>
                            </li>
                        @empty
                            <li class="list-group-item">Lista vacia</li>
                        @endforelse
                    </ul>

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