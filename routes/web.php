<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProveedorController;
use App\Http\Middleware\RedirectIfNotAuthorized;
use App\Http\Middleware\SoloAdministrador;  //el middleware solo administrador admite solo administradores
use App\Http\Middleware\AdministradorYEncargado; //este es para admin y encargado
use App\Http\Middleware\TodosRoles; //para todos los roles


Route::get('/', [UserController::class, 'loginIndex'])->name('login');
Route::post('/', [UserController::class, 'loginAttempt'])->name('intento');
Route::get('/error', [UserController::class, 'errror'])->name('error');
Route::get('/prohibido', [UserController::class, 'prohibido'])->name('prohibido');

Route::middleware(TodosRoles::class)->group(function () {  
    Route::get('/home', [UserController::class, 'home'])->name('home');
    Route::get('/logout', [UserController::class, 'loginOut'])->name('logout');
});

Route::prefix('user')->middleware(SoloAdministrador::class)->group(function () {  
    
    Route::get('/index', [UserController::class, 'index'])->name('r.user');
    Route::post('/create', [UserController::class, 'store'])->name('c.user');
    Route::post('/update', [UserController::class, 'update'])->name('u.user');
    Route::get('/delete/{id}', [UserController::class, 'destroy'])->name('d.user');
    
    Route::get('/create', [UserController::class, 'indexStore'])->name('ic.user');
    Route::get('/update/{id}', [UserController::class, 'indexUpdate'])->name('iu.user');

});

Route::prefix('proveedor')->middleware(SoloAdministrador::class)->group(function () {  
    
    Route::get('/index', [ProveedorController::class, 'index'])->name('r.proveedor');
    Route::post('/create', [ProveedorController::class, 'store'])->name('c.proveedor');
    Route::post('/update', [ProveedorController::class, 'update'])->name('u.proveedor');
    Route::get('/delete/{id}', [ProveedorController::class, 'destroy'])->name('d.proveedor');
    
    Route::get('/create', [ProveedorController::class, 'indexStore'])->name('ic.proveedor');
    Route::get('/update/{id}', [ProveedorController::class, 'indexUpdate'])->name('iu.proveedor');

});