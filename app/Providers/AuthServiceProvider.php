<?php

namespace App\Providers;

use App\Models\Cajas;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('dashboard-ver', function(User $user){ return $user->perfiles->map->permisos->flatten()->unique('pivot.salt')->where('pivot.salt', 'dashboard-ver')->first() ? true : false; });
        Gate::define('usuarios-crear', function(User $user){ return $user->perfiles->map->permisos->flatten()->unique('pivot.salt')->where('pivot.salt', 'usuarios-crear')->first() ? true : false; });
        Gate::define('usuarios-editar', function(User $user){ return $user->perfiles->map->permisos->flatten()->unique('pivot.salt')->where('pivot.salt', 'usuarios-editar')->first() ? true : false; });
        Gate::define('usuarios-ver', function(User $user){ return $user->perfiles->map->permisos->flatten()->unique('pivot.salt')->where('pivot.salt', 'usuarios-ver')->first() ? true : false; });
        Gate::define('perfiles-crear', function(User $user){ return $user->perfiles->map->permisos->flatten()->unique('pivot.salt')->where('pivot.salt', 'perfiles-crear')->first() ? true : false; });
        Gate::define('perfiles-editar', function(User $user){ return $user->perfiles->map->permisos->flatten()->unique('pivot.salt')->where('pivot.salt', 'perfiles-editar')->first() ? true : false; });
        Gate::define('perfiles-ver', function(User $user){ return $user->perfiles->map->permisos->flatten()->unique('pivot.salt')->where('pivot.salt', 'perfiles-ver')->first() ? true : false; });
        Gate::define('impuestos-crear', function(User $user){ return $user->perfiles->map->permisos->flatten()->unique('pivot.salt')->where('pivot.salt', 'impuestos-crear')->first() ? true : false; });
        Gate::define('impuestos-editar', function(User $user){ return $user->perfiles->map->permisos->flatten()->unique('pivot.salt')->where('pivot.salt', 'impuestos-editar')->first() ? true : false; });
        Gate::define('impuestos-ver', function(User $user){ return $user->perfiles->map->permisos->flatten()->unique('pivot.salt')->where('pivot.salt', 'impuestos-ver')->first() ? true : false; });
        Gate::define('sucursales-crear', function(User $user){ return $user->perfiles->map->permisos->flatten()->unique('pivot.salt')->where('pivot.salt', 'sucursales-crear')->first() ? true : false; });
        Gate::define('sucursales-editar', function(User $user){ return $user->perfiles->map->permisos->flatten()->unique('pivot.salt')->where('pivot.salt', 'sucursales-editar')->first() ? true : false; });
        Gate::define('sucursales-ver', function(User $user){ return $user->perfiles->map->permisos->flatten()->unique('pivot.salt')->where('pivot.salt', 'sucursales-ver')->first() ? true : false; });
        Gate::define('timbrados-crear', function(User $user){ return $user->perfiles->map->permisos->flatten()->unique('pivot.salt')->where('pivot.salt', 'timbrados-crear')->first() ? true : false; });
        Gate::define('timbrados-editar', function(User $user){ return $user->perfiles->map->permisos->flatten()->unique('pivot.salt')->where('pivot.salt', 'timbrados-editar')->first() ? true : false; });
        Gate::define('timbrados-ver', function(User $user){ return $user->perfiles->map->permisos->flatten()->unique('pivot.salt')->where('pivot.salt', 'timbrados-ver')->first() ? true : false; });
        Gate::define('cajas-crear', function(User $user){ return $user->perfiles->map->permisos->flatten()->unique('pivot.salt')->where('pivot.salt', 'cajas-crear')->first() ? true : false; });
        Gate::define('cajas-editar', function(User $user){ return $user->perfiles->map->permisos->flatten()->unique('pivot.salt')->where('pivot.salt', 'cajas-editar')->first() ? true : false; });
        Gate::define('cajas-ver', function(User $user){ return $user->perfiles->map->permisos->flatten()->unique('pivot.salt')->where('pivot.salt', 'cajas-ver')->first() ? true : false; });
        Gate::define('aperturas-crear', function(User $user){ return $user->perfiles->map->permisos->flatten()->unique('pivot.salt')->where('pivot.salt', 'aperturas-crear')->first() ? true : false; });
        Gate::define('aperturas-editar', function(User $user){ return $user->perfiles->map->permisos->flatten()->unique('pivot.salt')->where('pivot.salt', 'aperturas-editar')->first() ? true : false; });
        Gate::define('aperturas-ver', function(User $user){ return $user->perfiles->map->permisos->flatten()->unique('pivot.salt')->where('pivot.salt', 'aperturas-ver')->first() ? true : false; });
        Gate::define('depositos-crear', function(User $user){ return $user->perfiles->map->permisos->flatten()->unique('pivot.salt')->where('pivot.salt', 'depositos-crear')->first() ? true : false; });
        Gate::define('depositos-editar', function(User $user){ return $user->perfiles->map->permisos->flatten()->unique('pivot.salt')->where('pivot.salt', 'depositos-editar')->first() ? true : false; });
        Gate::define('depositos-ver', function(User $user){ return $user->perfiles->map->permisos->flatten()->unique('pivot.salt')->where('pivot.salt', 'depositos-ver')->first() ? true : false; });
        Gate::define('productos-crear', function(User $user){ return $user->perfiles->map->permisos->flatten()->unique('pivot.salt')->where('pivot.salt', 'productos-crear')->first() ? true : false; });
        Gate::define('productos-editar', function(User $user){ return $user->perfiles->map->permisos->flatten()->unique('pivot.salt')->where('pivot.salt', 'productos-editar')->first() ? true : false; });
        Gate::define('productos-ver', function(User $user){ return $user->perfiles->map->permisos->flatten()->unique('pivot.salt')->where('pivot.salt', 'productos-ver')->first() ? true : false; });
        Gate::define('clientes-crear', function(User $user){ return $user->perfiles->map->permisos->flatten()->unique('pivot.salt')->where('pivot.salt', 'clientes-crear')->first() ? true : false; });
        Gate::define('clientes-editar', function(User $user){ return $user->perfiles->map->permisos->flatten()->unique('pivot.salt')->where('pivot.salt', 'clientes-editar')->first() ? true : false; });
        Gate::define('clientes-ver', function(User $user){ return $user->perfiles->map->permisos->flatten()->unique('pivot.salt')->where('pivot.salt', 'clientes-ver')->first() ? true : false; });
        Gate::define('ventas-crear', function(User $user){ return $user->perfiles->map->permisos->flatten()->unique('pivot.salt')->where('pivot.salt', 'ventas-crear')->first() ? true : false; });
        Gate::define('ventas-editar', function(User $user){ return $user->perfiles->map->permisos->flatten()->unique('pivot.salt')->where('pivot.salt', 'ventas-editar')->first() ? true : false; });
        Gate::define('ventas-ver', function(User $user){ return $user->perfiles->map->permisos->flatten()->unique('pivot.salt')->where('pivot.salt', 'ventas-ver')->first() ? true : false; });
        Gate::define('proveedores-crear', function(User $user){ return $user->perfiles->map->permisos->flatten()->unique('pivot.salt')->where('pivot.salt', 'proveedores-crear')->first() ? true : false; });
        Gate::define('proveedores-editar', function(User $user){ return $user->perfiles->map->permisos->flatten()->unique('pivot.salt')->where('pivot.salt', 'proveedores-editar')->first() ? true : false; });
        Gate::define('proveedores-ver', function(User $user){ return $user->perfiles->map->permisos->flatten()->unique('pivot.salt')->where('pivot.salt', 'proveedores-ver')->first() ? true : false; });
        Gate::define('compras-crear', function(User $user){ return $user->perfiles->map->permisos->flatten()->unique('pivot.salt')->where('pivot.salt', 'compras-crear')->first() ? true : false; });
        Gate::define('compras-editar', function(User $user){ return $user->perfiles->map->permisos->flatten()->unique('pivot.salt')->where('pivot.salt', 'compras-editar')->first() ? true : false; });
        Gate::define('compras-ver', function(User $user){ return $user->perfiles->map->permisos->flatten()->unique('pivot.salt')->where('pivot.salt', 'compras-ver')->first() ? true : false; });
        Gate::define('transferencias-crear', function(User $user){ return $user->perfiles->map->permisos->flatten()->unique('pivot.salt')->where('pivot.salt', 'transferencias-crear')->first() ? true : false; });
        Gate::define('transferencias-ver', function(User $user){ return $user->perfiles->map->permisos->flatten()->unique('pivot.salt')->where('pivot.salt', 'transferencias-ver')->first() ? true : false; });


        Gate::define('cerrar-caja', function(User $user, $caja){
            $ap = DB::table('aperturas')->where('cajas_id', $caja->id)->whereNull('cierre')->first();
            return $user->id === $ap->users_id;
        });

    }
}
