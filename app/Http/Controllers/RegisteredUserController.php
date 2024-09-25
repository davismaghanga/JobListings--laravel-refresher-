<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store()
    {
        $validatedAttributes = request()->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required','email'],
            'password' => ['required', Password::min(6), 'confirmed']
        ]);
        //        $user = User::create($validatedAttributes);

        $user = new User();
        $user->first_name = $validatedAttributes['first_name'];
        $user->last_name = $validatedAttributes['last_name'];
        $user->email = $validatedAttributes['email'];
        $user->password = Hash::make($validatedAttributes['password']);
        $user->save();
        Auth::login($user);

        return redirect('/jobs');
    }
}
