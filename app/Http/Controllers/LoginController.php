<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Factory as ValidationFactory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    
    public function show() {
        return view('auth.login');
    } 

    public function login(Request $request) {

        //Credentials
        $credentials = [
            "email" => $request->email,
            "password" => $request->password
        ];

        $remember = ($request->has('remember') ? true : false);

        if(Auth::attempt($credentials, $remember)){

            //Login success
            $request->session()->regenerate();
            return redirect('/');

        } else {
            //Login fail
            return redirect('login');
        }
    }

    
}
