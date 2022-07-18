<div class="d-flex align-items-center">

    {{-- <span class="dropdown">
        <span class="" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-bell"></i>
        </span>
        <ul class="dropdown-menu dropdown-menu-end p-0 m-0">
            <li><a class="dropdown-item">Cerrar Sistema</a></li>
        </ul>
    </span> --}}

    @canany(['proveedores-ver', 'clientes-ver'])
        @livewire('components.buscador-inteligente')
    @endcanany
                
    <span class="dropdown p-3">
        <span class="" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-person"></i> {{$user->name}}
        </span>
        <ul class="dropdown-menu dropdown-menu-end p-0">
            <li>
                <a class="dropdown-item text-center" href="{{ route('miPerfil') }}">
                    <i class="bi bi-person"></i>
                    <p> {{$user->name}} </p>
                    <p> {{$user->email}} </p>
                </a>
            </li>
            <li>
                <a class="dropdown-item p-3" wire:click.prevent="logout">
                    <i class="bi bi-door-open"></i> Cerrar Sistema
                </a>
            </li>
        </ul>
    </span>

</div>
