<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    // Show login page
    public function index()
    {
        return view('login.index');
    }

    // Handle login authentication
    public function auth(Request $request)
    {
        // Validate email and password
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Attempt to log the user in
        if (Auth::attempt($credentials)) {
            // Regenerate session to prevent session fixation attacks
            $request->session()->regenerate();

            // Set session expiration time (e.g., 1 minute for demonstration purposes)
            $request->session()->put('expires_at', now()->addMinutes(1));

            // Redirect to dashboard or intended page
            return redirect()->intended('/dashboard');
        }

        // If login fails, redirect back with error message
        return redirect()->back()->withErrors(['error' => 'Invalid email or password']);
    }

    // Handle logout
    public function logout(Request $request)
    {
        // Log out the user
        Auth::logout();

        // Remove expiration time and invalidate the session
        $request->session()->forget('expires_at');
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect to the login page
        return redirect('/login');
    }

    // Middleware to check session expiration before any action
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            // If the session has expired, log out the user
            if ($request->session()->has('expires_at') && now()->greaterThan($request->session()->get('expires_at'))) {
                Auth::logout();
                $request->session()->invalidate();
                return redirect('/login')->withErrors(['error' => 'Your session has expired.']);
            }

            return $next($request);
        });
    }

    // Example of logging out if a sensitive change is made (e.g., password change)
    public function passwordChanged(Request $request)
    {
        // Assuming the password change logic is here...
        
        // Invalidate session to force re-login
        Auth::logout();
        $request->session()->invalidate();
        return redirect('/login')->with('status', 'Password changed. Please log in again.');
    }
}
