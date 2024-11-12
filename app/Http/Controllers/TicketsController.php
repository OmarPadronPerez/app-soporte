<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class TicketsController extends Controller
{
    public function verTickets()
    {
        $datos = DB::table('tickets')
            ->select('falla', 'Detalles', 'id')
            ->where('user', Session::get('id'))
            ->where('fecha_resuelto', NULL)
            ->get();

        return view('verTickets')->with('datos', $datos);
    }
    public function verTicketsid($id)
    {
        //return 'verTicketsid '.$id;
        //return redirect()->route('responder');
        //return view('responder');
        $datos = DB::table('tickets')
            ->where('id', $id)
            ->get();
        //return $dato;

        if (Session::get('tipo') == 1) { //si es administrador lleva a editar
            //return view('responder')->$datos;
            //return view('responder', ['dato' => $dato]);
            return view('responder')->with('datos', $datos);
        } else { //si es usuario estandar te redirige a solo ver
            return 'otro';
            //return view('verTickets',['id'=>$id]);
        }
    }


    public function crearTicket()
    {
        return view('crearTicket');
    }
    public function historialTicket()
    {
        return view('historial');
    }

    /*public function responderTicket($id){

        return 'en responder Ticket';
        
        /*$datos=DB::table('tickets')
        ->where('id', $id)
        ->get();
        return view('responder')->$datos;
    }*/

    public function guardarTicket(Request $request)
    {
        $datos = $request->all(); //buscar solo actualizar lo que se agrego
        return view('historial');
    }
    public function store(Request $request)
    {
        $datos = $request->all();
        //return $datos;
        Ticket::create($datos);
        //return response()->json($datos);
        return view('tickets');
    }
}
