<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function create(Request $request){
        return view('auth.regist');
    }

    public function store(){
        $user = User::create(request(['name','email','password']));
        return redirect()->to('/auth/login');
    }

    public function login(){
        return view('auth.login');
    }

    public function login_store(Request $request){
        $credentials = request(['email','password']);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect("/blog");
        }

        return back()->withErrors([
            "message" => "The provided email or password doesn't match our records."
        ]);
    }
}
