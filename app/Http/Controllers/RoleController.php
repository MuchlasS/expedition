<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(){
        $role = Role::all();
        return view('roles.index', ['rolesData' => $role]);
    }

    public function create(Request $request){
        Role::create([
            'name' => $request->role_name
        ]);
        return redirect('/roles')->with('success', 'Add roles successfully');
    }

    public function edit($id){
        $role = Role::findOrFail($id);
        return view('roles.edit', ['editData' => $role]);
    }

    public function update(Request $request, $id){
        $role = Role::findOrFail($id);
        $role->update([
            'name' => $request->role_name
        ]);
        return redirect('/roles')->with('success', 'Role '.$role->name.' updated');
    }

    public function delete($id){
        $role = Role::findOrFail($id);
        $name = $role->name;

        $role->delete($role);
        return redirect('/roles')->with('success', 'Role '.$name.' deleted');
    }
}
