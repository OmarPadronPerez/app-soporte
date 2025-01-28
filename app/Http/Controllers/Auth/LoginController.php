<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public $maxAttempts = 3;
    public $decayMinutes = 30;

    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        //return 'entra';
        $credentials = [
            "user_servidor" => $request->name,
            "password" => $request->password
        ];
        //return $credentials;
        if (Auth::attempt($credentials)) {
            $datos = DB::table('users')
                ->select('area', 'id', 'name', 'activo', 'administrador')
                ->where('user_servidor', $credentials['user_servidor'])
                ->get();

            if ($datos[0]->activo == 1) {
                $request->session()->regenerate();
                //return "si";
                Session::put('user', $credentials['user_servidor']);
                Session::put('nombre', $datos[0]->name);
                Session::put('administrador', $datos[0]->administrador);
                Session::put('area', $datos[0]->area);
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
    public function username()
    {
        return 'user_servidor';
    }
    public function password()
    {
        return 'pass_servidor';
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
