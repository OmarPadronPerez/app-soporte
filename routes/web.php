<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ReportesController;
use App\Http\Controllers\TicketsController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;
//rutas login/logout
Route::GET('/',[LoginController::class, 'index']);
Route::GET('/login',[LoginController::class, 'index'])->name('Login');
Route::POST('/aunt',[LoginController::class, 'login']);
Route::GET('/logout',[LoginController::class, 'logout'])->name('logout');

//rutas ticket
Route::GET('/nuevo',[TicketsController::class, 'crearTicket']);
Route::POST('/nuevo/envtkt',[TicketsController::class, 'store']);
Route::GET('tickets',[TicketsController::class, 'verTickets']);
Route::GET('tickets/{id}',[TicketsController::class, 'verTicketsid']);

Route::GET('historial',[TicketsController::class,'historialTicket']);
Route::GET('completo/{id}',[TicketsController::class, 'verTicketCompleto']);
Route::POST('/tckActualizar',[TicketsController::class,'actualizar'])->name('tckActualizar');

//rutas administrar usuario
Route::GET('usuarios',[UsuarioController::class,'verUsuarios']);
Route::GET('usuarios/{id}',[UsuarioController::class,'actUsuario']);
Route::POST('gUsuario',[UsuarioController::class,'gUsuario']);
Route::Get('nuevoUsuario',[UsuarioController::class,'index']);
Route::POST('nuevoUsuario/nsStorage',[UsuarioController::class,'store'])->name('usuario.store');

//rutas administrar reportes
Route::GET('reportes',[ReportesController::class,'index']);
Route::GET('reportes/excel',[ReportesController::class,'exportarExcel']);





