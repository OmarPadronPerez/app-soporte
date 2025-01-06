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
        $columnas = [
            'users.name',
            'users.lastName',
            'tickets.id',
            'tickets.created_at',
            'tickets.Falla',
            'tickets.Detalles',
            'tickets.Urgencia'
        ];

        if (Session::get('area') == 'SOPORTE') {
            $datos = DB::table('tickets')
                ->select($columnas)
                ->join('users', 'tickets.Creador_id', '=', 'users.id')
                ->where('tickets.fecha_resuelto', NULL)
                ->orderBy('tickets.created_at', 'asc')
                ->orderByRaw("FIELD(tickets.Urgencia,'Critica')")
                
                ->get();
        } else {
            $datos = DB::table('tickets')
                ->select($columnas)
                ->where(function ($query) {
                    $query->where('tickets.Creador_id', '=', Session::get('id'))
                        ->orWhere('tickets.Creador_id', '=', 1);
                })
                ->where('tickets.fecha_resuelto', NULL)
                ->join('users', 'tickets.Creador_id', '=', 'users.id')
                ->orderBy('tickets.created_at', 'asc')
                ->orderByRaw("FIELD(tickets.Urgencia,'Critica')")
                ->get();
        }
       return view('verTickets')->with('datos', $datos);
        //return $datos;
        //return view('verTickets')->with('datos', $datos)->with('mensaje',$mensaje);
    }
    public function verTicketsid($id)
    {
        $datos = DB::table('tickets')
            ->select(
                'users.name',
                'users.lastName',
                'tickets.id',
                'tickets.created_at',
                'tickets.fecha_resuelto',
                'tickets.Falla',
                'tickets.Detalles',
                'tickets.Urgencia',
                'tickets.Diagnostico',
                'tickets.Archivo',
                'tickets.Creador_id'
            )
            ->join('users', 'tickets.Creador_id', '=', 'users.id')
            ->where('tickets.id', $id)
            ->get();
        if (Session::get('area') == 'SOPORTE') { //si es administrador lleva a editar
            return view('responder')->with('datos', $datos);
        } else { //si es usuario estandar te redirige a solo ver
            return view('completo')->with('datos', $datos);
        }
    }


    public function crearTicket()
    {
        if (Session::get('area') == 'SOPORTE') {
            $datos = DB::table('users')
                ->select('id', 'name', 'lastName', 'lastName2')
                ->orderBy('name', 'asc')
                ->get();

            //return $datos;
            return view('crearTicket')->with('datos', $datos);
        } else {
            return view('crearTicket');
        }
    }

    public function historialTicket()
    {
        $columnas = [
            'users.name',
            'users.lastName',
            'tickets.id',
            'tickets.created_at',
            'tickets.fecha_resuelto',
            'tickets.Falla',
            'tickets.Detalles',
            'tickets.Urgencia'
        ];
        if (Session::get('area') == 'SOPORTE') {
            $datos = DB::table('tickets')
                ->select($columnas)
                ->where('tickets.fecha_resuelto', '!=', NULL)
                ->join('users', 'tickets.Creador_id', '=', 'users.id')
                ->orderBy('tickets.created_at', 'asc')
                ->get();
        } else {
            $datos = DB::table('tickets')
                ->select($columnas)
                ->where(function ($query) {
                    $query->where('tickets.Creador_id', '=', Session::get('id'))
                        ->orWhere('tickets.Creador_id', '=', 1);
                })
                ->where('tickets.fecha_resuelto', '!=', NULL)
                ->join('users', 'tickets.Creador_id', '=', 'users.id')
                ->orderBy('tickets.created_at', 'asc')
                ->get();
        }
        return view('historial')->with('datos', $datos);
    }

    public function store(Request $request)
    {
        $datos = $request->all();

        if (Session::get('area') == 'SOPORTE') {
            $datos['Creador_id'] = $datos['usuario2'];
        }

        if (isset($datos["file"])) {

            $file = $request->file('file');
            $fecha = date_format(new \DateTime(), "Y_m_d");
            $nombre = $datos['Creador_id'] . "_" . $fecha . "_" . uniqid() . "." . $file->getClientOriginalExtension();
            $destinationPath = 'archivos/' . $datos['Creador_id'] . "/";
            $file->move($destinationPath, $nombre);
            $datos["Archivo"] = $nombre;
        }
        $data=Ticket::create($datos);

        return redirect('/nuevo/mailTicketNuevo/'.$data->id);
        //return redirect('tickets');
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
            //return redirect('historial');
            return  redirect('/nuevo/mailTicketCerrado/'.$datos['id']);
        } else {
            DB::table('tickets')
                ->where('id', $datos['id'])
                ->update([
                    'Diagnostico' => $datos['Diagnostico'],
                    'urgencia' => $datos['prioridad'],
                    'updated_at' => $now
                ]);
            return redirect('tickets');
            
        }
    }

    public function verTicketCompleto($id)
    {
        $datos = DB::table('tickets')
            ->where('id', $id)
            ->get();
        return view('completo')->with('datos', $datos);
    }

    public function descagarArchivo($id, $file)
    {
        $ruta = public_path('images\\' . $id . "\\" . $file);
        //return $ruta;
        return response()->download($ruta);
    }
}
