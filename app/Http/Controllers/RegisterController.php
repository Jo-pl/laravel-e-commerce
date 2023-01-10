<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    function create(){
        return view('sessions.create');
    }

    function store(){
        $credentials = request()->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required'],
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        $user = User::create($credentials);
        Auth::login($user);

        return redirect('/');
    }
}
