<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class RegisterController extends Controller
{

    
    public function show() {
        return view('auth.register');
    } 
    
    public $account = getenv('HABLAME_ACCOUNT');

    public function register(RegisterRequest $request) {
        $user = User::create($request->Validated());


        return redirect('/login')->with('success', 'Usuario creado correctamente');
    }

    public function sendSms(Request $request) {

        $curl = curl_init();
    
        curl_setopt_array($curl, [
        CURLOPT_URL => "https://api103.hablame.co/api/sms/v3/send/priority",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => json_encode([
        'toNumber' => $request->input('phone'),
        'sms' => 'Welcome to test for JACS3D',
        'flash' => '0',
        'sc' => '890202',
        'request_dlvr_rcpt' => '0'
        ]),
        CURLOPT_HTTPHEADER => [
        "Account: 10019287",
        "ApiKey: PMsSKjH9h1z4tA0C3UuyJZZ9WN1oNq",
        "Content-Type: application/json",
        "Token: f2be57eb09df89ee004125674646c7d3"
        ],
    ]);
    
    $response = curl_exec($curl);
    $err = curl_error($curl);
    
    curl_close($curl);
    
    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
      echo $response;
    }

    return redirect('/login')->with('success', 'Usuario creado correctamente');

        }

}
