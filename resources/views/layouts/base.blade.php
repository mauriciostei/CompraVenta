<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <title>ERP</title>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    @livewireStyles
</head>
<body>
    @auth
        <div class="d-flex">
            <div class="vh-100 bg-light p-3 pt-2 border-right shadow" id="menu">
                @livewire('components.menu-usuario')
            </div>
            <div class="w-100">
                <nav class="navbar bg-light p-2 border-bottom">
                    <div class="navbar-brand">
                        <a id="toggleMenu">
                            <i class="bi bi-list"></i>
                        </a>
                    </div>
                    @livewire('components.botonera-usuario')
                </nav>
                <div class="container-fluid p-3">
                    @yield('pagina')
                    @livewire('components.toast-container')
                    @livewire('components.cuadro-busqueda-inteligente')
                </div>
            </div>
        </div>

    @endauth

    @guest
        <div class="container-fluid">
            @yield('pagina')
        </div>
    @endguest
    
    <script src="{{ mix('js/app.js') }}" defer></script>
    @livewireScripts
</body>
</html>