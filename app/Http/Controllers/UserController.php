<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $user = User::all();
        // return $user;
        return view('users.index', ['usersData' => $user]);
    }

    public function edit($id){
        $user['users'] = User::findOrFail($id);
        $user['roles'] = Role::all();
        return view('users.edit', ['usersData' => $user]);
    }

    public function update(Request $request, $id){
        $user = User::findOrFail($id);
        $user->update($request->all());

        return redirect('/user')->with('success', 'User '.$user->name.' updated');
    }

    public function delete($id){
        $user = User::findOrFail($id);
        $name = $user->name;

        $user->delete();
        return redirect('/user')->with('success', 'User '.$name.' Deleted');
    }
}
