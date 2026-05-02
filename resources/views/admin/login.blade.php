@extends('layouts.app')

@section('title', 'Admin Login')

@section('content')
<div style="min-height: 100vh; display: flex; align-items: center; justify-content: center; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
    <div style="background: white; padding: 40px; border-radius: 8px; box-shadow: 0 10px 40px rgba(0,0,0,0.3); width: 100%; max-width: 400px;">

        <h1 style="text-align: center; color: #333; margin-bottom: 10px; font-size: 28px;">Admin Login</h1>
        <p style="text-align: center; color: #666; margin-bottom: 30px;">Enter your credentials</p>

        @if($message = Session::get('error'))
            <div style="background-color: #f8d7da; color: #721c24; padding: 12px; border-radius: 4px; margin-bottom: 20px; border: 1px solid #f5c6cb;">
                {{ $message }}
            </div>
        @endif

        @if($message = Session::get('success'))
            <div style="background-color: #d4edda; color: #155724; padding: 12px; border-radius: 4px; margin-bottom: 20px; border: 1px solid #c3e6cb;">
                {{ $message }}
            </div>
        @endif

        <form action="{{ route('admin.login') }}" method="POST">
            @csrf

            <div style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 8px; font-weight: bold; color: #333;">Username</label>
                <input type="text" name="username" required autofocus style="width: 100%; padding: 12px; border: 2px solid #ddd; border-radius: 4px; box-sizing: border-box; font-size: 16px;">
            </div>

            <div style="margin-bottom: 30px;">
                <label style="display: block; margin-bottom: 8px; font-weight: bold; color: #333;">Password</label>
                <input type="password" name="password" required style="width: 100%; padding: 12px; border: 2px solid #ddd; border-radius: 4px; box-sizing: border-box; font-size: 16px;">
            </div>

            <button type="submit" style="width: 100%; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 12px; border: none; border-radius: 4px; cursor: pointer; font-size: 16px; font-weight: bold;">Login</button>
        </form>

        <p style="text-align: center; color: #999; margin-top: 20px; font-size: 14px;">Demo credentials: shakil / 1234</p>
    </div>
</div>
@endsection
