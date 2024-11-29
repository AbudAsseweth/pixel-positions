<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class SessionController extends Controller
{
    public function create()
    {
        return view("auth.login");
    }

    public function store(Request $request)
    {
        $attrs = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', Password::min(6)],
        ]);

        if (!Auth::attempt($attrs)) {
            return back()->withErrors([
                'email' => "The provided credentials do not match our records.",
            ])->onlyInput('email');
        }

        $request->session()->regenerate();

        return to_route('home');
    }

    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return to_route("home");
    }
}
