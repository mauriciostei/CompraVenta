<?php

use App\Http\Controllers\AperturasController;
use App\Http\Controllers\CajasController;
use App\Http\Controllers\ComprasController;
use App\Http\Controllers\DepositosController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\IvasController;
use App\Http\Controllers\PerfilesController;
use App\Http\Controllers\PersonasController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\SucursalesController;
use App\Http\Controllers\TimbradosController;
use App\Http\Controllers\TransferenciasController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\VentasController;
use Illuminate\Support\Facades\Route;


Route::get('/login', [UsersController::class, 'loginForm'])->name('login');
Route::post('/login', [UsersController::class, 'loginValidate']);

Route::middleware('auth')->group(function(){

    Route::get('miPerfil', [UsersController::class, 'miPerfil'])->name('miPerfil');
    Route::resource('users', UsersController::class);
    Route::resource('perfiles', PerfilesController::class);
    Route::resource('sucursales', SucursalesController::class);
    Route::resource('depositos', DepositosController::class);
    Route::resource('productos', ProductosController::class);
    Route::resource('timbrados', TimbradosController::class);
    Route::resource('cajas', CajasController::class);
    Route::resource('aperturas', AperturasController::class);
    Route::resource('personas', PersonasController::class);
    Route::resource('ivas', IvasController::class);
    Route::resource('compras', ComprasController::class);
    Route::resource('ventas', VentasController::class);
    Route::resource('transferencias', TransferenciasController::class);

    Route::get('/', [InicioController::class, 'index']);

    Route::get('imprimirFactura/{id}', [VentasController::class, 'imprimirFactura']);

});