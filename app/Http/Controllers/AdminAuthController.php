<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    // Show login form
    public function showLogin()
    {
        return view('admin.login');
    }

    // Handle login
    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        // Simple hardcoded credentials
        if ($username === 'shakil' && $password === '1234') {
            session(['admin_authenticated' => true]);
            return redirect()->route('admin.products')->with('success', 'Logged in successfully!');
        }

        return back()->with('error', 'Invalid credentials!');
    }

    // Logout
    public function logout()
    {
        session()->forget('admin_authenticated');
        return redirect()->route('admin.login')->with('success', 'Logged out successfully!');
    }
}
