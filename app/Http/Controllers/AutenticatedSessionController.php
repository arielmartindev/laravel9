<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AutenticatedSessionController extends Controller
{
    public function store (Request $req) 
    {
        $credentials = $req->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);

        $rememberBool = $req->boolean('remember');

        if ( ! Auth::attempt($credentials, $rememberBool ) ) {
            throw ValidationException::withMessages([
                //'email' => 'You Shall Not Pass!'
                'email' => __('auth.failed')
            ]);
        }

        // login exitoso
        $req->session()->regenerate();

        return redirect()->intended()
        ->with('status', 'You are logged in');

    }


    public function destroy(Request $req) 
    {
        Auth::guard('web')->logout();

        $req->session()->invalidate();

        $req->session()->regenerateToken();

        return to_route('posts.index')
        ->with('status', 'You are logged out');
    }


}
