<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function loginPost(Request $request){
        if(Auth::attempt($request->only('email', 'password'))){
            return redirect('/roles');
        }
        return redirect('/login');
    }

    public function register(){
        return view('auth.register');
    }

    public function registerPost(Request $request){
        $role_id = $request->role_id !== null ? $request->role_id : 2;
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role_id' => $role_id
        ]);

        if($role_id == 1){
            return redirect('/user');
        }
        return redirect('/login');
    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}
