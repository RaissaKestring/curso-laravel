<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function auth(Request $request) {

        $credenciais = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if(Auth::attempt($credenciais)) {

            $request->session()->regenerate();
            return redirect()->intented('dashboard');

        } else { 
            
            return redirect()->back()->with('error','Usuário ou senha inválido.');
        }
    }
}
