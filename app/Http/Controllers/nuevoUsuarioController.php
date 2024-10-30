<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class nuevoUsuarioController extends Controller
{
    public function index(){
        return view('nuevoUsuario');
    }

    public function store(Request $request){
        $datos=$request->all();
        User::create($request->all());
        return response()->json($datos);
    }
}
