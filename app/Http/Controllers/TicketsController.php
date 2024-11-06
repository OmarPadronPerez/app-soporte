<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class TicketsController extends Controller
{
    public function verTickets(){
        $datos=DB::table('users')
        ->where('user', Session::get('user'))
        ->where('fecha_resuelto','=','NULL')
        ->all();
        return view('verTickets');
    }
    public function verTicketsid($id){
        if(Session::get('tipo')==1){
            return view('esponder/'+$id);
        }else{
            return view('verTickets/'+$id);
        }
    }

    public function crearTicket(){
        return view('crearTicket');
    }
    public function historialTicket(){
        return view('historial');
    }
    public function responderTicket(){
        return view('responder');
    }
    public function guardarTicket(Request $request){
        $datos=$request->all();//buscar solo actualizar lo que se agrego
        return view('historial');
    }
    public function store(Request $request){
        $datos=$request->all();
        //return $datos;
        Ticket::create($datos);
        //return response()->json($datos);
        return view('tickets');
    }
}
