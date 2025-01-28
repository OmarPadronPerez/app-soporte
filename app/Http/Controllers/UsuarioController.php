<?php

namespace App\Http\Controllers;

use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

use function Laravel\Prompts\alert;

class UsuarioController extends Controller
{
    public function index()
    {
        return view('nuevoUsuario');
    }
    public function verUsuarios()
    {
        $datos = DB::table('users')
            ->select('id', 'name', 'lastName', 'lastName2', 'area', 'activo', 'updated_at','administrador')
            ->orderBy('name', 'asc')
            ->get();

        return view('usuarios')->with('datos', $datos);
    }

    public function store(Request $request)
    {
        $datos = $request->all();

        $datos["password"] = $datos["pass_servidor"];
        User::create($datos);
        return redirect('usuarios')->with('mensaje', 'Usuario guardado');
    }

    public function actUsuario($id)
    {
        $datos = DB::table('users')
            ->where('id', $id)
            ->get();
        $datos[0]->id = $id;
        
        return view('actUsuario')->with('datos', $datos);
    }

    public function gUsuario(Request $request)
    {
        $datos = $request->all();
        $now = new \DateTime();

        $actualizar = array(
            'administrador' => $datos['administrador'],
            'pass_aps' => $datos['pass_aps'],
            'pass_vpn' => $datos['pass_vpn'],
            'pass_pc' => $datos['pass_pc'],
            'pass_correo' => $datos['pass_correo'],
            'pass_servidor' => $datos['pass_servidor'],
            'password' => Hash::make($datos['pass_servidor']),
            'activo' => $datos['activo'],
            'updated_at' => $now

        );
        DB::table('users')
            ->where('id', $datos['id'])
            ->update($actualizar);

        //return $sql;
        return redirect('usuarios');
    }

    public function exportarApdf($id)
    {
        $datos = DB::table('users')
            ->where('id', $id)
            ->get()->toArray();
            
        $datoArray = [
            'id'=>$datos[0]->id,
            'area' => $datos[0]->area,
            'name' => $datos[0]->name,
            'lastName' => $datos[0]->lastName,
            'lastName2' => $datos[0]->lastName2,
            'pass_pc' => $datos[0]->pass_pc,
            'pass_aps' => $datos[0]->pass_aps,
            'correo' => $datos[0]->correo,
            'pass_correo' => $datos[0]->pass_correo,
            'user_vpn' => $datos[0]->user_vpn,
            'pass_vpn' => $datos[0]->pass_vpn,
            'user_servidor' => $datos[0]->user_servidor,
            'pass_servidor' => $datos[0]->pass_servidor,
        ];
        $nombre=$id."_".$datoArray['lastName']."_".$datoArray['lastName2'].".pdf";


        $pdf = Pdf::loadView('usuarioPDF', $datoArray);

        //return view('usuarioPDF')->with($datoArray);
        return $pdf->download($nombre);
    }
    function mi_informacion(){
        $datos = DB::table('users')
        ->where('id', '=', Session::get('id'))
        ->get();

        return view('usuarioCompleto')->with('datos',$datos);
    }
}
