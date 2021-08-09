<?php

namespace App\Http\Controllers;

use App\Models\DeliveryArea;
use Laravolt\Indonesia\Models\Province;
use Illuminate\Http\Request;

class DeliveryAreaController extends Controller
{
    public function index(){
        $data = DeliveryArea::all();
        // return $data;

        return view('delivery.areas.index', ['data' => $data]);
    }

    public function create(Request $request){
        // return $request;
        DeliveryArea::create($request->all());
        return redirect('/delivery-area')->with('success', 'Add delivery area successfully');
    }

    public function edit($id){
        $data = DeliveryArea::findOrFail($id);
        
        return view('delivery.areas.edit', ['editData' => $data]);
    }

    public function update(Request $request, $id){
        $data = DeliveryArea::findOrFail($id);
        $data->update($request->all());

        return redirect('/delivery-area')->with('success', 'Delivery Area '.$data->area->name.' updated');
    }

    public function delete($id){
        $data = DeliveryArea::findOrFail($id);
        $name = $data->area->name;
        $data->delete();

        return redirect('/delivery-area')->with('success', 'Delivery Area '.$name.' deleted');
    }
}
