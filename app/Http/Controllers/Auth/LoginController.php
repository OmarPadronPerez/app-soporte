<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

            //$request->session()->regenerate();
            //return "si";
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
        return route('/login');
    }
}
