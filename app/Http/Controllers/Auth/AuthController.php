<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;

// for pathing purposes
use App\Http\Controllers\Controller;
use Dotenv\Exception\ValidationException;
// for pathing purposes

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin(){
        return view('auth.login');
    }
    public function showSignup(){
        return view('auth.signup');
    }

    public function signup(Request $request){
        // validate the user input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $validated['password'] = bcrypt($validated['password']);

        $user = User::create($validated);

        Auth::login($user);

        session()->put('show_genre_modal', true);
        return redirect()->route('homepage');
    }

    public function login(Request $request)
    {
        // Validate the user input
        $validated = $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string',
        ]);

        // Attempt to authenticate the user
        if (Auth::attempt($validated)) {
            $request->session()->regenerate();
            return redirect()->route('homepage');
        }
        // If authentication fails, set error message
        return redirect()->route('login')->with('error', 'Sorry, incorrect credentials provided. Please try again.');
    }

    public function logout(Request $request){
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
