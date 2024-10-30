<?php

namespace App\Http\Controllers;

class TicketsController extends Controller
{
    public function verTickets(){
        return view('verTickets');
    }
    public function verTicketsid(){
        return view('verTickets');
    }

    public function crearTicket(){
        return view('crearTicket');
    }
    public function historialTicket(){
        return view('crearTicket');
    }
    public function responderTicket(){
        return view('responder');
    }
}
