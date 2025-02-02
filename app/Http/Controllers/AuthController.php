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
            return redirect()->route("home");
        }

        return redirect()->back()->withErrors(["email" => "email or password incorrect"])->withInput();
    }

    public function Logout(Request $request){
        Auth::logout();

        try{
            Auth::guard('api')->setToken(session('access_token'))->logout();
            $request->session()->forget('access_token');
            return redirect()->route('login');

        }catch(\Exception $e){
            $request->session()->forget('access_token');
            return redirect()->route('login');
        }

    }
}
