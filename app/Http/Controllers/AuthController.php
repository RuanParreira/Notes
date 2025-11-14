<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthLogin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function index()
    {
        return view('login');
    }

    public function login(AuthLogin $request)
    {
        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {
            session()->regenerate();

            return redirect()->intended('home')->with('success', 'Logado com sucesso');
        }

        return back()->withErrors([
            'credenciais' => 'Credenciais invalidas'
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
