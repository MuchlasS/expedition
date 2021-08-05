<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    public function index(){
        $area = Area::all();
        return view('area.index', ['area' => $area]);
    }

    public function create(Request $request){
        $area = Area::create($request->all());
        return redirect('/area')->with('success', 'Area '.$area->name.' added successfully');
    }

    public function edit($id){
        $area = Area::findOrFail($id);
        return view('area.edit', ['editData' => $area]);
    }

    public function update(Request $request, $id){
        $area = Area::findOrFail($id);
        $area->update($request->all());
        return redirect('/area')->with('success', 'Area '.$area->name.' Updated');
    }

    public function delete($id){
        $area = Area::findOrFail($id);
        $name = $area->name;
        $area->delete($area);

        return redirect('/area')->with('success', 'Area '.$area->name.' Deleted');
    }
}
