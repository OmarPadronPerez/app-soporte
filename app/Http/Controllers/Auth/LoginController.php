<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
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

            $request->session()->regenerate();
            //return "si";
            Session::put('user', $credentials['name']);

            $datos=DB::table('users')
            ->select('tipo', 'id')
            ->where('name', $credentials['name'])
            ->get();

            Session::put('tipo', $datos[0]->tipo);
            Session::put('id', $datos[0]->id);
            return redirect('/nuevo');
        } else {
            //return "no";
            return redirect('/login');
        }
    }
    public function authenticate(Request $request) {}

    public function register(Request $request) //registrar usuario
    {}

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
