<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\historialController;
use App\Http\Controllers\nuevoUsuarioController;
use App\Http\Controllers\responderController;
use App\Http\Controllers\TicketsController;
use Illuminate\Support\Facades\Route;

Route::GET('/',[LoginController::class, 'index']);
Route::GET('/login',[LoginController::class, 'index'])->name('Login');
Route::POST('/aunt',[LoginController::class, 'login']);
Route::GET('/logout',[LoginController::class, 'logout'])->name('logout');


Route::GET('tickets',[TicketsController::class, 'verTickets']);
Route::GET('tickets/{id}',[TicketsController::class, 'verTicketid']);
Route::GET('/nuevo',[TicketsController::class, 'crearTicket']);
Route::GET('historial',[TicketsController::class,'historialTicket']);
Route::GET('responder',[TicketsController::class,'responderTicket']);

Route::get('nuevoUsuario',[nuevoUsuarioController::class,'index']);
Route::POST('nuevoUsuario/nsStorage',[nuevoUsuarioController::class,'store'])->name('usuario.store');



/*Route::get('/', function () {
    return view('welcome');
});*/
