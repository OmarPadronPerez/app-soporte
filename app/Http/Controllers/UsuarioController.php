<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
            ->select('name', 'name_user', 'tipo', 'id', 'activo', 'updated_at','correo')
            ->orderBy('name', 'asc')
            ->get();

        return view('usuarios')->with('datos', $datos);
    }

    public function store(Request $request)
    {
        $request['name_user'] = strtoupper($request['name_user']);
        User::create($request->all());
        return redirect('usuarios');
        //return response()->json($datos);
    }
    public function actUsuario($id)
    {
        $datos = DB::table('users')
            ->select('name', 'name_user', 'tipo', 'activo','correo')
            ->where('id', $id)
            ->get();
        $datos[0]->id = $id;
        return view('actUsuario')->with('datos', $datos);
    }
    public function gUsuario(Request $request){
        $datos = $request->all();
        $now = new \DateTime();
        //return $datos;
        $actualizar=array(
            'tipo' => $datos['tipo'],
            'activo'=>$datos['activo'],
            'updated_at'=>$now
        );
        if($datos['correo']){
            $actualizar['correo'] =$datos['correo'];
        }
        if($datos['password']){
            $actualizar['password']=Hash::make($datos['password']);
        }
        
        //return $actualizar;
        DB::table('users')
        ->where('id', $datos['id'])
        ->update($actualizar);
        
        //return $sql;
        return redirect('usuarios');
    }
}
