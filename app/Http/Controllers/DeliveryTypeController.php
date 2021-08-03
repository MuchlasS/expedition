<?php

namespace App\Http\Controllers;

use App\Models\DeliveryType as Type;
use Illuminate\Http\Request;

class DeliveryTypeController extends Controller
{
    public function index(){
        $deliveryType = Type::all();
        return view('delivery.types.index', ['deliveryTypesData' => $deliveryType]);
    }

    public function create(Request $request){
        Type::create($request->all());
        return redirect('/delivery-type')->with('success', 'Add Delivery Types Successfully');
    }

    public function edit($id){
        $deliveryType = Type::findOrFail($id);
        return view('delivery.types.edit', ['editData' => $deliveryType]);
    }

    public function update(Request $request, $id){
        $deliveryType = Type::findOrFail($id);
        $deliveryType->update($request->all());
        return redirect('/delivery-type')->with('success', 'Type '.$deliveryType->name.' Updated');
    }

    public function delete($id){
        $deliveryType = Type::findOrFail($id);
        $name = $deliveryType->name;

        $deliveryType->delete($deliveryType);
        return redirect('/delivery-type')->with('success', 'Type '.$name.' Deleted');
    }
}
