<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\crearTicketController;
use App\Http\Controllers\verTicketsController;
use App\Http\Controllers\historialController;

Route::get('/',[loginController::class, 'index']);
Route::get('login',[loginController::class, 'index']);
Route::get('tickets',[verTicketsController::class, 'index']);
Route::get('nuevo',[crearTicketController::class, 'index']);
Route::get('historial',[historialController::class,'index']);



/*Route::get('/', function () {
    return view('welcome');
});*/
