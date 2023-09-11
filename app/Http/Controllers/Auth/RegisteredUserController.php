<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Validation\Rules;
use Illuminate\Http\Request;
use App\Models\User;

class RegisteredUserController extends Controller
{
    public function store(Request $req) 
    {
        //return $req;
        $req->validate([
            
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()]
        ]);

        User::create([
            'name' => $req->name,
            'email' => $req->email,
            'password' => bcrypt($req->password),
            //'password' => Hash::make($req->password),
            
        ]);

        
            return to_route('login')->with('status', 'Acount Created!');

    }
}
