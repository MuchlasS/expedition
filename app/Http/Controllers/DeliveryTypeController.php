<?php

namespace App\Http\Controllers;

use App\Models\DeliveryType as Type;
use Illuminate\Http\Request;

class DeliveryTypeController extends Controller
{
    public function index(){
        $data = Type::all();
        return view('delivery.types.index', ['deliveryTypesData' => $data]);
    }

    public function create(Request $request){
        Type::create($request->all());
        return redirect('/delivery-type')->with('success', 'Add delivery type successfully');
    }

    public function edit($id){
        $data = Type::findOrFail($id);
        return view('delivery.types.edit', ['editData' => $data]);
    }

    public function update(Request $request, $id){
        $data = Type::findOrFail($id);
        $data->update($request->all());

        return redirect('/delivery-type')->with('success', 'Type '.$data->name.' updated');
    }

    public function delete($id){
        $data = Type::findOrFail($id);
        $name = $data->name;
        $data->delete();
        
        return redirect('/delivery-type')->with('success', 'Type '.$name.' deleted');
    }
}
