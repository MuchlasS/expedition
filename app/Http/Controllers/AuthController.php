<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use App\Models\OfficeUserInfo;
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
        // return ;
    }

    public function register(){
        return view('auth.register');
    }

    public function registerPost(Request $request){
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'hp' => $request->hp,
            'address' => $request->address,
            'gender' => $request->gender
        ]);

        $officeUserInfo = OfficeUserInfo::create([
            'office_name' => $request->office_name,
            'office_email' => $request->office_email,
            'office_address' => $request->office_address,
            'office_telephone' => $request->office_telephone,
            'user_id' => $user->id
        ]);
        return redirect('/login');
    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}
