@extends('layouts.base')

@section('pagina')

<div class="row">
    <div class="col"></div>
    <div class="col-12 col-lg-8">

        <div class="card">
            <div class="card-body">
            
                <div class="container-fluid pt-3">
                    <div class="d-lg-flex align-items-start">
                        <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <button class="nav-link active" data-bs-toggle="pill" data-bs-target="#v-pills-datos" type="button" role="tab" aria-controls="v-pills-datos" aria-selected="true">Mis Datos</button>
                            <button class="nav-link" data-bs-toggle="pill" data-bs-target="#v-pills-password" type="button" role="tab" aria-controls="v-pills-password" aria-selected="false">Reiniciar Contraseña</button>
                        </div>

                        <div class="tab-content w-75 mx-auto">
                            <div class="tab-pane fade show active" id="v-pills-datos" role="tabpanel" aria-labelledby="v-pills-datos-tab" tabindex="0">
                                @livewire('users.mis-datos')
                            </div>
                            <div class="tab-pane fade" id="v-pills-password" role="tabpanel" aria-labelledby="v-pills-password-tab" tabindex="0">
                                @livewire('users.password')
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <div class="col"></div>
</div>

@endsection