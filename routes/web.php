<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ReportesController;
use App\Http\Controllers\TicketsController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;
//rutas login/logout
Route::GET('/',[LoginController::class, 'index']);
Route::GET('/login',[LoginController::class, 'index'])->name('login');
Route::POST('/aunt',[LoginController::class, 'login']);
Route::GET('/logout',[LoginController::class, 'logout'])->name('logout');

//rutas ticket
Route::GET('/nuevo',[TicketsController::class, 'crearTicket'])->middleware('auth');
Route::POST('/nuevo/envtkt',[TicketsController::class, 'store'])->middleware('auth');
Route::GET('tickets',[TicketsController::class, 'verTickets'])->middleware('auth');
Route::GET('tickets/{id}',[TicketsController::class, 'verTicketsid'])->middleware('auth');
Route::GET('tickets/{id}/{file}',[TicketsController::class, 'descagarArchivo'])->middleware('auth');


Route::GET('historial',[TicketsController::class,'historialTicket'])->middleware('auth');
Route::GET('completo/{id}',[TicketsController::class, 'verTicketCompleto'])->middleware('auth');
Route::POST('/tckActualizar',[TicketsController::class,'actualizar'])->name('tckActualizar')->middleware('auth');


//rutas administrar usuario
Route::GET('usuarios',[UsuarioController::class,'verUsuarios'])->middleware('auth');
Route::GET('usuarios/{id}',[UsuarioController::class,'actUsuario'])->middleware('auth');
Route::POST('gUsuario',[UsuarioController::class,'gUsuario'])->middleware('auth');
Route::Get('nuevoUsuario',[UsuarioController::class,'index']);
Route::POST('nuevoUsuario/nsStorage',[UsuarioController::class,'store'])->name('usuario.store');
Route::get('usuarios/{id}/pdf',[UsuarioController::class,'exportarApdf'])->middleware('auth');

//rutas administrar reportes
Route::GET('reportes',[ReportesController::class,'index'])->middleware('auth');
Route::GET('reportes/excel',[ReportesController::class,'exportarExcel'])->middleware('auth');





