<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    //

    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'min:2'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'confirmed', Password::min(6)],
            'user_name' => ['required', 'min:2']
        ]);

        $user = User::create($validated);

        Auth::login($user);

        return redirect('/');



        //Password::min(6)->mixedCase()->uncompromised(1)->letters()->numbers()->symbols()

    }
}
