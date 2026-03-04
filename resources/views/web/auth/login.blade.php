@extends('layouts.frontend')

@section('content')
<section id="login-section" style="min-height: 60vh; display: flex; align-items: center; justify-content: center; padding: 40px 20px;">
    <div style="width: 100%; max-width: 400px; background: white; padding: 40px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
        <h1 style="text-align: center; margin-bottom: 30px; color: #333; font-size: 28px;">
            Đăng Nhập
        </h1>

        @if ($errors->any())
            <div style="background: #fee; border: 1px solid #fcc; color: #c00; padding: 15px; border-radius: 4px; margin-bottom: 20px;">
                <ul style="margin: 0; padding-left: 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div style="background: #efe; border: 1px solid #cfc; color: #0c0; padding: 15px; border-radius: 4px; margin-bottom: 20px;">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST" style="display: flex; flex-direction: column; gap: 20px;">
            @csrf

            <div>
                <label for="email" style="display: block; margin-bottom: 8px; font-weight: 500; color: #333;">
                    Email
                </label>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    value="{{ old('email') }}"
                    style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; font-size: 14px; box-sizing: border-box;"
                    required
                >
            </div>

            <div>
                <label for="password" style="display: block; margin-bottom: 8px; font-weight: 500; color: #333;">
                    Mật Khẩu
                </label>
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; font-size: 14px; box-sizing: border-box;"
                    required
                >
            </div>

            <button 
                type="submit" 
                style="padding: 12px; background: #ff6600; color: white; border: none; border-radius: 4px; font-size: 16px; font-weight: 600; cursor: pointer; transition: background 0.3s ease;"
                onmouseover="this.style.background='#e55a00'"
                onmouseout="this.style.background='#ff6600'"
            >
                Đăng Nhập
            </button>
        </form>

        <p style="text-align: center; margin-top: 20px; color: #666;">
            Chưa có tài khoản? 
            <a href="{{ route('user.home') }}" style="color: #ff6600; text-decoration: none; font-weight: 600;">
                Quay lại trang chủ
            </a>
        </p>
    </div>
</section>
@endsection
