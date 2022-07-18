@extends('layouts.base')

@section('pagina')

<form method="POST" action="/perfiles/{{ $perfil->id }}">
@method('PUT')
@csrf
    
        <div class="row">
            <div class="col"></div>
            <div class="col-12 col-lg-4">
    
                <div class="card">
                    <div class="card-header">Crear Perfil</div>
                    <div class="card-body">
            
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" placeholder="Nombre" name="nombre" value="{{ $perfil->nombre }}"/>
                            <label>Nombre</label>
                            @error('nombre')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" name="activo" value="true" {{ ($perfil->activo) ? 'checked' : '' }} >
                            <label class="form-check-label">Activo</label>
                        </div>

                    </div>
                </div>
    
            </div>
    
            <div class="col-12 col-lg-4 pt-3 pt-lg-0">
    
                <div class="card">
                    <div class="card-header">Permisos del perfil</div>
                    <div class="card-body">

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Permiso</th>
                                    <th>Ver</th>
                                    <th>Editar</th>
                                    <th>Crear</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($permisos as $pe)
                                    <tr>
                                        <td> {{$pe->nombre}} </td>
                                        <td>
                                            @if($pe->ver)
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" role="switch" name="permisos[]" value="{{$pe->nombre}}-ver" {{ ($pe->ver_activo) ? 'checked' : '' }} >
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            @if($pe->editar)
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" role="switch" name="permisos[]" value="{{$pe->nombre}}-editar" {{ ($pe->editar_activo) ? 'checked' : '' }} >
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            @if($pe->crear)
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" role="switch" name="permisos[]" value="{{$pe->nombre}}-crear" {{ ($pe->crear_activo) ? 'checked' : '' }} >
                                                </div>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">Sin datos</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

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