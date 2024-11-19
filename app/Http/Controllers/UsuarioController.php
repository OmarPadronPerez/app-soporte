<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index(){
        return view('nuevoUsuario');
    }

    public function store(Request $request){
        $request['name_user']=strtoupper($request['name_user']);
        User::create($request->all());
        return url('login');
        //return response()->json($datos);
    }
    
}
