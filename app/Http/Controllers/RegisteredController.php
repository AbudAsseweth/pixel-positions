<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\File;
use Illuminate\Validation\Rules\Password;

class RegisteredController extends Controller
{
    public function create()
    {
        return view("auth.register");
    }

    public function store(Request $request)
    {
        $userAttrs = $request->validate([
            "name" => ['required'],
            "email" => ['required', 'email', 'unique:users,email'],
            "password" => ['required', Password::min(6), 'confirmed'],
        ]);

        $request->validate([
            "employer" => ['required'],
            "logo" => ['required', File::types(['jpg', 'png', 'webp'])],
        ]);

        $user = User::create($userAttrs);

        $user->employer()->create([
            "name" => $request->employer,
            "logo" => $request->file('logo')->store('logos'),
        ]);

        Auth::login($user);

        return to_route("home");
    }
}
