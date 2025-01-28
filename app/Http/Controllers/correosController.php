<?php

namespace App\Http\Controllers;

use App\Mail\ticketnuevo;
use App\Mail\fallaglobal;
use App\Mail\ticketcerrado;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class correosController extends Controller
{
    public function nuevoTicket($id)
    {
        //envia a la base de datos los datos del ticket
        $datos = DB::table('tickets')
            ->select(
                'users.name',
                'users.lastName',
                'users.correo',
                'tickets.id',
                'tickets.created_at',
                'tickets.Falla',
                'tickets.Detalles',
                'tickets.Diagnostico',
                'tickets.Archivo',
                'tickets.Creador_id'
            )
            ->join('users', 'tickets.Creador_id', '=', 'users.id')
            ->where('tickets.id', $id)
            ->get();
        $datos = $datos[0];
        $enviardb = DB::table('users')
            ->select('correo')
            ->where('activo', 1)
            ->where('id', $datos->Creador_id)
            ->orWhere('area', 'SOPORTE')
            ->where('id', '!=', 1)
            ->get()->toArray();
        $enviararray = [];

        for ($i = 0; $i < count($enviardb); $i++) {
            $enviararray[$i] = $enviardb[$i]->correo;
        };
        Mail::to($enviararray)
            ->send(new ticketnuevo($datos));

        if ($datos) {
            $mensaje = [
                'estado' => 'realizado',
                'titulo' => 'Ticket cerrado',
                'mensaje' => 'el ticket fue creado con exito'
            ];
            return redirect('tickets')->with('mensaje', $mensaje);
        } else {
            $mensaje = [
                'estado' => 'falla',
                'titulo' => 'Ticket NO guardado',
                'mensaje' => 'Hubo una falla al guardar tu ticket, ponte en contacto con soporte tecnico'
            ];
            return redirect('tickets')->with('mensaje', $mensaje);
        }
    }

    public function cerradoTicket($id)
    {
        //se obtienen los datos del ticket
        $datos = DB::table('tickets')
            ->select(
                'users.name',
                'users.lastName',
                'users.correo',
                'tickets.id',
                'tickets.created_at',
                'tickets.fecha_resuelto',
                'tickets.Falla',
                'tickets.Detalles',
                'tickets.Diagnostico',
                'tickets.Archivo',
                'tickets.Creador_id',
                'tickets.resuelto_id'
            )
            ->join('users', 'tickets.Creador_id', '=', 'users.id')
            ->where('tickets.id', $id)
            ->get()->toArray();

        //se obtienen los datos de la persona que resolvio el ticket
        $datos2 = DB::table('users')
            ->select('id', 'name', 'lastName', 'lastName2')
            ->where('id', $datos[0]->resuelto_id)
            ->get()->toArray();
        $datos = $datos[0];
        $datos->id = $datos2[0]->id;
        $datos->resuelto_name = $datos2[0]->name;
        $datos->resuelto_lastName = $datos2[0]->lastName;
        $datos->resuelto_lastName2 = $datos2[0]->lastName2;
        //return $datos;
        $receptor = [$datos->correo];

        Mail::to($receptor)
            ->send(new ticketcerrado($datos));
        $mensaje = [
            'estado' => 'realizado',
            'titulo' => 'Ticket cerrado',
            'mensaje' => 'el ticket ' . $id . ' fue cerrado con exito'
        ];

        if ($datos) {
            $mensaje = [
                'estado' => 'realizado',
                'titulo' => 'Ticket cerrado',
                'mensaje' => 'el ticket ' . $id . ' fue cerrado con exito'
            ];
        } else {
            $mensaje = [
                'estado' => 'falla',
                'titulo' => 'Ticket NO guardado',
                'mensaje' => 'Hubo una falla al guardar tu ticket, ponte en contacto con soporte tecnico'
            ];
        }
        return redirect('historial')->with('mensaje', $mensaje);
    }

    public function fallaglobal($id)
    {
        $base = DB::table('tickets')
            ->select(
                'tickets.id',
                'tickets.created_at',
                'tickets.Falla',
                'tickets.Detalles',
                'tickets.Urgencia',
                'tickets.Diagnostico',
                'tickets.Archivo',
                'tickets.Creador_id'
            )
            ->where('tickets.id', $id)
            ->get();
        $datos = [
            'id' => $base[0]->id,
            'created_at' => $base[0]->created_at,
            'Falla' => $base[0]->Falla,
            'Detalles' => $base[0]->Detalles,
            'Urgencia' => $base[0]->Urgencia,
            'Diagnostico' => $base[0]->Diagnostico,
            'Archivo' => $base[0]->Archivo,
            'Creador_id' => $base[0]->Creador_id,
            'lastName' => 'Falla',
            'name' => 'General',
        ];
        $correos= $this->correostodos();

        //return $datos;

        Mail::to($correos)
            ->send(new fallaglobal($datos));

        if ($datos) {

            $mensaje = [
                'estado' => 'realizado',
                'titulo' => 'Ticket guardado',
                'mensaje' => 'Nos pondremos en contacto lo antes posible'
            ];
            return redirect('tickets')->with('mensaje', $mensaje);
        } else {
            $mensaje = [
                'estado' => 'falla',
                'titulo' => 'Ticket NO guardado',
                'mensaje' => 'Hubo una falla al guardar tu ticket, ponte en contacto con soporte tecnico'
            ];
            return redirect('tickets')->with('mensaje', $mensaje);
        }
    }
    public function correostodos()
    {
        $enviar = DB::table('users')
            ->select('correo')
            ->where('activo', 1)
            ->get();

        $correos = [];
        foreach ($enviar as $a) {
            array_push($correos, $a->correo);
        }
        return $correos;
    }
}
