<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Timbrados;
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

        if (Session::get('administrador') ) {
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
                'tickets.updated_at',
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
        //if (Session::get('area') == 'SOPORTE') { //si es administrador lleva a editar
        if(Session::get('administrador') ){
            return view('responder')->with('datos', $datos);
        } else { //si es usuario estandar te redirige a solo ver
            return view('completo')->with('datos', $datos);
        }
    }


    public function crearTicket()
    {
        if (Session::get('administrador') ) {
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
        if (Session::get('administrador') ) {
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
        $enviar = [];
        $pasa = false;

        if (Session::get('administrador')) {
            $datos['Creador_id'] = $datos['usuario2'];
        } else {
            $datos['Creador_id'] = Session::get('id');
        }
        $enviar['Creador_id'] = $datos['Creador_id'];

        //prepara los datos para exportarlos,si es timbrado lo acomoda y exporta
        if ($datos['Falla1'] != 'Timbrado') {
            $enviar['Falla'] = $datos['Falla1'] . '/' . $datos['Falla2'];
            $enviar['Detalles'] = $datos['Detalles'];

            if (isset($datos["file"])) { //si existe un archivo lo carga

                $file = $request->file('file');
                $fecha = date_format(new \DateTime(), "Y_m_d");
                $nombre = $datos['Creador_id'] . "_" . $fecha . "_" . uniqid() . "." . $file->getClientOriginalExtension();
                $destinationPath = 'archivos/' . $datos['Creador_id'] . "/";
                $file->move($destinationPath, $nombre);
                $enviar['Archivo'] = $nombre;
                //$datos["Archivo"] = $nombre;
            }
            $data = Ticket::create($enviar);
            if ($data->id) {
                $pasa = true;
            }
        } else {
            $empleados = '';
            $servicio = '';
            if (isset($datos['cb_empleados_todos'])) {
                $empleados = 'todos';
            } else {
                $empleados = $datos['formEmpleados'];
            }
            if (asset($datos['servicio_timbrado']) == 'on') {
                $servicio .= 'Timbrado ';
            }
            if (asset($datos['servicio_Cancelacion'] )== 'on') {
                if (strlen($servicio) > 0) {
                    $servicio .= '/ ';
                }
                $servicio += 'Cancelación';
            }
            $enviar['Falla'] = 'TIMBRADO';
            $enviar['Detalles'] = 
                'Empresa: ' . $datos['Empresa'] . ' ' .
                'Ejercicio: ' . $datos['Ejercicio'] . ' ' .
                'servicio: ' . $servicio . ' ' .
                'Tipo de periodo: ' . $datos['tipo_periodo'] . ' ' .
                'Periodo: ' . $datos['periodo'] . ' ' .
                'Empleados: ' . $empleados . ' ' .
                'Comentarios: ' . $datos['Comentarios'];
            $data = Ticket::create($enviar);
            if ($data->id) {
                $enviar['id'] = $data->id;
                $enviar['empresa'] = $datos['Empresa'];
                $enviar['ejercicio'] = $datos['Ejercicio'];
                $enviar['tipo_periodo'] = $datos['tipo_periodo'];
                $enviar['periodo'] = $datos['periodo'];
                $enviar['empleados'] = $empleados;
                $enviar['comentarios'] = $datos['Comentarios'];
                $data = Timbrados::create($enviar);
                if ($data->id) {
                    $pasa = true;
                }
            }
        }
        if ($pasa) {
            return redirect('/nuevo/mailTicketNuevo/' . $data->id);
        } else {
            $mensaje=[
                'titulo'=>'Error',
                'mensaje'=>'Error al guardar el ticket',
                'estado'=>'falla'
            ];
            return redirect()->back()
            ->with('mensaje', $mensaje);
        }
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
            return  redirect('/nuevo/mailTicketCerrado/' . $datos['id']);
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
        ->select(
            'users.name',
            'users.lastName',
            'tickets.id',
            'tickets.created_at',
            'tickets.updated_at',
            'tickets.fecha_resuelto',
            'tickets.Falla',
            'tickets.Detalles',
            'tickets.Urgencia',
            'tickets.Diagnostico',
            'tickets.Archivo',
            'tickets.Creador_id',
            'tickets.resuelto_id'
        )
        ->join('users', 'tickets.Creador_id', '=', 'users.id')
        ->where('tickets.id', $id)
        ->get();
        /*$datos = $datos[0];*/

        $resuelto= DB::table('users')
                ->select('id', 'name', 'lastName', 'lastName2')
                ->where('id', $datos[0]->resuelto_id)
                ->get();
        $datos[0]->id = $resuelto[0]->id;
        $datos[0]->resuelto_name = $resuelto[0]->name;
        $datos[0]->resuelto_lastName = $resuelto[0]->lastName;
        $datos[0]->resuelto_lastName2 = $resuelto[0]->lastName2;

        return view('completo')->with('datos', $datos);
    }

    public function descagarArchivo($id, $file)
    {
        $ruta = public_path('archivos\\' . $id . "\\" . $file);
        //return $ruta;
        return response()->download($ruta);
    }
}
