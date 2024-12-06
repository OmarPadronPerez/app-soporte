<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use AuthenticatesUsers;

class LoginController extends Controller
{
    public $maxAttempts=3;
    public $decayMinutes=30;   

    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        //return 'entra';
        $credentials = [
            "name" => $request->name,
            "password" => $request->password,

        ];
        //return $credentials;
        if (Auth::attempt($credentials)) {
            $datos = DB::table('users')
                ->select('tipo', 'id', 'name_user', 'activo')
                ->where('name', $credentials['name'])
                ->get();

            if ($datos[0]->activo == 1) {
                $request->session()->regenerate();
                //return "si";
                Session::put('user', $credentials['name']);
                Session::put('tipo', $datos[0]->tipo);
                Session::put('nombre', $datos[0]->name_user);
                Session::put('id', $datos[0]->id);
                return redirect('/nuevo');
            } else {
                //return "no";
                return redirect('/login')->with("error", "inactivo");
            }
        } else {
            //return "no";
            return view('/login')->with("error", "contraseña");
        }
    }
    

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
