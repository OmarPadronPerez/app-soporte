<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Container\Attributes\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class TicketsController extends Controller
{
    public function verTickets()
    {
        if (Session::get('tipo') == 1) {
            $datos = DB::table('tickets')
                ->where('fecha_resuelto', NULL)
                ->orderBy('created_at', 'asc')
                ->get();
        } else {
            $datos = DB::table('tickets')
                ->where('Creador_id', Session::get('id'))
                ->where('fecha_resuelto', NULL)
                ->orderBy('created_at', 'asc')
                ->get();
        }
        return view('verTickets')->with('datos', $datos);
    }
    public function verTicketsid($id)
    {
        $datos = DB::table('tickets')
            ->where('id', $id)
            ->get();
        if (Session::get('tipo') == 1) { //si es administrador lleva a editar
            return view('responder')->with('datos', $datos);
        } else { //si es usuario estandar te redirige a solo ver
            //return 'otro';
            return view('verTickets')->with('datos', $datos);
        }
    }


    public function crearTicket()
    {
        if (Session::get('tipo') == 1) {

            $datos = DB::table('users')
                ->select('id', 'name')
                ->get();
            return view('crearTicket')->with('datos', $datos);
        } else {
            return view('crearTicket');
        }
    }

    public function historialTicket()
    {
        $datos = DB::table('tickets')
            ->where('fecha_resuelto', "!=", NULL)
            ->orderBy('fecha_resuelto', 'desc')
            ->get();
        return view('historial')->with('datos', $datos);
    }

    /*public function responderTicket($id){

        return 'en responder Ticket';
        
        /*$datos=DB::table('tickets')
        ->where('id', $id)
        ->get();
        return view('responder')->$datos;
    }*/

    public function store(Request $request)
    {
        $datos = $request->all();
        
        if (Session::get('tipo') == 1) {
            $datos['Creador_id'] = $datos['usuario2'];
        }
        
        if (isset($datos["file"])) {//poner lo de la foto
            
            $file = $request->file('file');
            $fecha = date_format(new \DateTime(), "Y_m_d");
            $nombre=$datos['Creador_id']."_".$fecha."_". uniqid() .".".$file->getClientOriginalExtension();
            /*$nombre=$datos['Creador_id'] ;
            $datos["Foto"]=Storage::disk('local')->put($nombre, $file);
            Storage::put($nombre, $file);*/
            $destinationPath = 'images/'.$datos['Creador_id']."/";
            $file->move($destinationPath, $nombre);
            $datos["Foto"]=$nombre;
            
        }

        Ticket::create($datos);
        return redirect('tickets');
    }

    public function actualizar(Request $request)
    {
        $datos = $request->all();
        $now = new \DateTime();
        //return $datos;

        if ($datos['Estado'] == 'Concluido') {
            DB::table('tickets')
                ->where('id', $datos['id'])
                ->update([
                    'resuelto_id' => Session::get('id'),
                    'Diagnostico' => $datos['Diagnostico'],
                    'urgencia' => $datos['prioridad'],
                    'fecha_resuelto' => $now,
                    'updated_at' => $now
                ]);
        } else {
            DB::table('tickets')
                ->where('id', $datos['id'])
                ->update([
                    'Diagnostico' => $datos['Diagnostico'],
                    'urgencia' => $datos['prioridad'],
                    'updated_at' => $now
                ]);
        }
        return redirect('historialTicket');
    }

    public function verTicketCompleto($id)
    {
        $datos = DB::table('tickets')
            ->where('id', $id)
            ->get();
        return view('completo')->with('datos', $datos);
    }
    
    public function descagarArchivo($id,$file)
    {
        $ruta=public_path('images\\'.$id."\\".$file);
        //return $ruta;
        return response()->download($ruta);
    }

}
