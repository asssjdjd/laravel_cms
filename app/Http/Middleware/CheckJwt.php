<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class CheckJwt
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if user has JWT token in session
        $token = session('jwt_token');

        if (!$token) {
            return redirect()->route('login')->with('error', 'Vui lòng đăng nhập');
        }

        try {
            // Set token for JWTAuth
            JWTAuth::setToken($token)->authenticate();
        } catch (JWTException $e) {
            session()->forget('jwt_token');
            return redirect()->route('login')->with('error', 'Token không hợp lệ hoặc hết hạn');
        }

        return $next($request);
    }
}
