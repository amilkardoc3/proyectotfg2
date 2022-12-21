<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PersonaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PermisoController;
use App\Http\Controllers\RolController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::middleware(['auth'])->group(function () {

    // Route::resource('persona', PersonaController::class);
    Route::get('persona/permiso', [PersonaController::class, 'spatie']);
    Route::resource('persona', PersonaController::class);
    Route::resource('usuario', UsuarioController::class);
    Route::resource('permiso', PermisoController::class);
    Route::resource('rol', RolController::class);
    
    Route::get('/', function () {
        return view('template/admin');
    })->name('/');
    
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
