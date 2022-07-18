<div>
    
    <div class="text-lg text-center pt-0 pb-3">
        <img src="{{ asset('img/logo.png') }}" width="38px" alt="Logo de su compañía"/>
    </div>

    <div>

        @canany(['dashboard-ver'])
            <h6 class="pt-2">Inicio</h6>
            <nav class="nav flex-column">
                @can('dashboard-ver')
                    <a class="nav-link" href="/">Dashboard</a>
                @endcan
            </nav>
        @endcanany
        

        @canany(['usuarios-ver', 'perfiles-ver', 'sucursales-ver', 'impuestos-ver'])
            <h6 class="pt-2">Configuración</h6>
            <nav class="nav flex-column">
                @can('usuarios-ver')
                    <a class="nav-link" href="/users">Usuarios</a>
                @endcan
                @can('perfiles-ver')
                    <a class="nav-link" href="/perfiles">Perfiles</a>
                @endcan
                @can('sucursales-ver')
                    <a class="nav-link" href="/sucursales">Sucursales</a>
                @endcan
                @can('impuestos-ver')
                    <a class="nav-link" href="/ivas">Impuestos</a>
                @endcan
            </nav>
        @endcanany

        @canany(['cajas-ver', 'timbrados-ver'])
            <h6 class="pt-2">Documentación</h6>
            <nav class="nav flex-column">
                @canany(['cajas-ver', 'aperturas-ver'])
                    <a class="nav-link" href="/cajas">Cajas</a>
                @endcanany
                @can('timbrados-ver')
                    <a class="nav-link" href="/timbrados">Timbrados</a>
                @endcan
            </nav>
        @endcanany

        @canany(['depositos-ver', 'productos-ver', 'transferencias-ver'])
            <h6 class="pt-2">Inventario</h6>
            <nav class="nav flex-column">
                @can('depositos-ver')
                    <a class="nav-link" href="/depositos">Depósitos</a>
                @endcan
                @can('productos-ver')
                    <a class="nav-link" href="/productos">Productos</a>
                @endcan
                @can('transferencias-ver')
                    <a class="nav-link" href="/transferencias">Transferencias</a>
                @endcan
            </nav>
        @endcanany

        @canany(['proveedores-ver', 'compras-ver'])
            <h6 class="pt-2">Compras</h6>
            <nav class="nav flex-column">
                @can('proveedores-ver')
                    <a class="nav-link" href="/personas">Proveedores</a>
                @endcan
                @can('compras-ver')
                    <a class="nav-link" href="/compras">Compras</a>
                @endcan
            </nav>
        @endcanany

        @canany(['clientes-ver', 'ventas-ver'])
            <h6 class="pt-2">Ventas</h6>
            <nav class="nav flex-column">
                @can('clientes-ver')
                    <a class="nav-link" href="/personas">Clientes</a>
                @endcan
                @can('ventas-ver')
                    <a class="nav-link" href="/ventas">Ventas</a>
                @endcan
            </nav>
        @endcanany

    </div>

</div>