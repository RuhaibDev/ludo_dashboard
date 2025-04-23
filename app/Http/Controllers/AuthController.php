<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Show login form (if you prefer route closures, skip these)
    public function showLogin()
    {
        return view('auth.login');
    }

    // Handle login submission
    public function login(Request $request)
    {
        // 1) Make sure email and password are filled in correctly
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|min:6',
        ]);
    
        // 2) Try to log in using the credentials (no remember-me)
        if (Auth::attempt($request->only('email','password'))) {
            // Good! Clear old session data and give new session ID
            $request->session()->regenerate();
    
            // Send user to the dashboard
            return redirect('/dashboard');
        }
    
        // 3) If login failed, go back with a simple error message
        return back()->with('error', 'These credentials do not match our records.');
    }
    

    // Show registration form
    public function showRegister()
    {
        return view('auth.register');
    }

    // Handle registration
    public function register(Request $request)
    {
        // 1. Validate input
        $data = $request->validate([
            'name'                  => 'required|string|max:255',
            'email'                 => 'required|email|unique:users,email',
            'password'              => 'required|min:6|confirmed',
        ]);

        // 2. Create user (hash password)
        $user = User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        // 3. Log them in
        Auth::login($user);

        // 4. Redirect to dashboard
        return redirect('/dashboard');
    }

    // Log the user out
    public function logout(Request $request)
    {
        Auth::logout();

        // Invalidate & regenerate session token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
