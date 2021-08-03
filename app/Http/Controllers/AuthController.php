<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use App\Models\OfficeUserInfo as Office;
use App\Models\OfficeUserInfo;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index(){
        $userData = User::with('officeInfo')->get();
        return view('auth.index', ['userData' => $userData]);
    }

    public function edit($id){
        $userData = User::with('officeInfo')->where('id', $id)->get();
        return view('auth.edit', ['editData' => $userData[0]]);
    }

    public function update(Request $request, $id){
        $userData = User::with('officeInfo')->where('id', $id)->get();
        $user = $userData[0];
        
        $officeData = Office::findOrFail($user->officeInfo->id);
        
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'hp' => $request->hp,
            'address' => $request->address,
            'gender' => $request->gender,
            'roles_id' => $user->roles_id
        ]);

        $officeData->update([
            'office_name' => $request->office_name,
            'office_telephone' => $request->office_telephone,
            'office_address' => $request->office_address
        ]);

        return redirect('/user')->with('success', 'User '.$user->name.' Updated');
    }

    public function delete($id){
        $userData = User::with('officeInfo')->where('id', $id)->get();
        $user = $userData[0];
        $name = $user->name;
        
        $officeData = Office::findOrFail($user->officeInfo->id);

        $user = User::findOrFail($id);

        $user->delete($user);
        $officeData->delete($officeData);

        return redirect('/user')->with('success', 'User '.$name.' Deleted');
    }
    
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
        $roles = 1;
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'hp' => $request->hp,
            'address' => $request->address,
            'gender' => $request->gender,
            'roles_id' => $roles
        ]);

        if($user->id){
            $officeUserInfo = OfficeUserInfo::create([
                'office_name' => $request->office_name,
                'office_email' => $request->office_email,
                'office_address' => $request->office_address,
                'office_telephone' => $request->office_telephone,
                'user_id' => $user->id
            ]);
        }

        return redirect('/login');
    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}
