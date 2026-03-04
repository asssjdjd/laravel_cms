<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class LoginController extends Controller
{
    /**
     * Show login page
     */
    public function show()
    {
        return view('web.auth.login');
    }

    /**
     * Handle login request
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            return back()->withErrors([
                'email' => 'Email hoặc mật khẩu không chính xác',
            ])->withInput();
        }

        // Generate JWT token
        $token = JWTAuth::fromUser($user);

        // Store token in session
        session(['jwt_token' => $token]);

        // Redirect based on role
        if ($user->role === 'admin') {
            return redirect()->route('admin.home')->with('success', 'Đăng nhập thành công!');
        }

        return redirect()->route('user.home')->with('success', 'Đăng nhập thành công!');
    }

    /**
     * Handle logout
     */
    public function logout()
    {
        session()->forget('jwt_token');

        return redirect()->route('user.home')->with('success', 'Đăng xuất thành công!');
    }
}
