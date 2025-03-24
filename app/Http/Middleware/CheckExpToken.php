<?php

namespace App\Http\Middleware;

use Closure;
use Firebase\JWT\Key;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Firebase\JWT\JWT;
use Firebase\JWT\ExpiredException;
use Auth;

class CheckExpToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = session('access_token');

        if (!$token) {
            return redirect("logout");
        }


        try {
            $decoded = JWT::decode($token, new Key(env("JWT_SECRET"), "HS256"));
        } catch (ExpiredException $e) {
            return redirect('logout');
        } catch (\Exception $e) {
            return redirect('logout');
        }




        return $next($request);
    }
}
