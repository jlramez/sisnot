<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('Auth/login');
});


Auth::routes(["register" => false]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => ['auth']], function() {
	Route::get('/evento/{id}', [App\Http\Controllers\EventoController::class, 'index'])
	->name('evento.index');
	Route::post('/evento/create', [App\Http\Controllers\EventoController::class, 'store'])
	->name('evento.store');
	Route::post('/evento/show/', [App\Http\Controllers\EventoController::class, 'show'])
	->name('evento.show');
	Route::post('/evento/edit/{id}', [App\Http\Controllers\EventoController::class, 'edit'])
	->name('evento.edit');
	Route::post('/evento/update/{evento}', [App\Http\Controllers\EventoController::class, 'update'])
	->name('evento.update');
	Route::post('/evento/delete/{id}', [App\Http\Controllers\EventoController::class, 'destroy'])
	->name('evento.delete');
	});
//Route Hooks - Do not delete//
	Route::view('parts', 'livewire.parts.index')->middleware('auth');
	Route::view('tipoods', 'livewire.tipoods.index')->middleware('auth');
	Route::view('consultas', 'livewire.consultas.index')->middleware('auth');
	Route::view('users', 'livewire.users.index')->middleware('auth');
	Route::view('roles', 'livewire.roles.index')->middleware('auth');
	Route::view('permissions', 'livewire.permissions.index')->middleware('auth');
	Route::view('actuaciones', 'livewire.actuaciones.index')->middleware('auth');
	Route::view('ponencias', 'livewire.ponencias.index')->middleware('auth');
	Route::view('actuarios', 'livewire.actuarios.index')->middleware('auth');
	Route::view('expedientes', 'livewire.expedientes.index')->middleware('auth');
	Route::view('estados', 'livewire.estados.index')->middleware('auth');
	Route::view('tipos', 'livewire.tipos.index')->middleware('auth');