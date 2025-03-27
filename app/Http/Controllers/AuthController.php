<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Nette\Schema\ValidationException;

class AuthController extends Controller
{
    public function create()
    {
        return inertia('Auth/Login');
    }

    public function store(Request $request)
    {
        if (
            !Auth::attempt($request->validate([
                'email' => 'required|string|email',
                'password' => 'required|string',
            ]), true)) {

            throw ValidationException::withMessages([
               'email' => 'Authentication failed'
            ]);
        }

//        we have to regenerate the session to overcome the possibility of get attacked

        $request->session()->regenerate();

        return redirect()->intended();
    }

    public function destroy()
    {

    }
}
