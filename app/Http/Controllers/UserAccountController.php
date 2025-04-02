<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAccountController extends Controller
{
    public function create()
    {
        return inertia('UserAccount/Create');
    }

    public function store(Request $request)
    {
       $user = User::make($request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
        ]));
       // we dont need to hash a user in laravel 10+, laravel did it for us
//       $user->password = Hash::make($user->password);
        $user->save();
        Auth::login($user);

       return redirect()->route('listing.index')->with('success', 'Account Created');
    }
}
