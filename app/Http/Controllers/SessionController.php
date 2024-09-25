<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store()
    {
        $attributes = request()->validate([
            'email' => ['required','email'],
            'password' => ['required']
        ]);
        //attempt to login
//        Auth::attempt($attributes);
        if(!Auth::attempt($attributes)){
            throw ValidationException::withMessages([
                'email' => 'Sorry, those credentials do not match'
            ]);
        }

        //provide new session token as security measure
        request()->session()->regenerate();
        //redirect
        return redirect('/jobs');

    }

    public function destroy()
    {
        Auth::logout();
        return redirect('/');
    }


}
