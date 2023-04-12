<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Factory as ValidationFactory;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    
    public function show() {
        return view('auth.login');
    } 

    public function login(Request $request) {
        $credentials = [
            "email" => $request->email,
            "password" => $request->password
        ];

        $remember = ($request->has('remember') ? true : false);

        if(Auth::attempt($credentials, $remember)){

            $request->session()->regenerate();

            return redirect('/');

        } else {
            return redirect('login');
        }
    }

    
}
