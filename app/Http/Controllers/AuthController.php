<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{

    public function LoginView(request $request){
        return view ("auth.login");
    }

    public function Login(Request $request){

        $credentcial = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if (Auth::attempt($credentcial) && $accessToken = Auth::guard('api')->attempt($credentcial)) {
            session(['access_token' => $accessToken]);
            return redirect()->route("dashboard");
        }

        return redirect()->back()->withErrors(["email" => "email or password incorrect"])->withInput();
    }
}
