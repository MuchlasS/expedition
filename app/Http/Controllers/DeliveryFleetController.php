<?php

namespace App\Http\Controllers;

use App\Models\DeliveryFleet as Fleet;
use App\Models\DeliveryType as Type;
use Illuminate\Http\Request;

class DeliveryFleetController extends Controller
{
    public function index(){
        $deliveryFleet = Fleet::with('deliveryType')->get();
        return view('delivery.fleets.index', ['fleetsData' => $deliveryFleet]);
    }

    public function create(Request $request){
        Fleet::create($request->all());
        return redirect('/delivery-fleet')->with('success', 'Add Delivery Types Successfully');
    }

    public function edit($id){
        $data['editData'] = Fleet::with('deliveryType')->where('id', $id)->get();
        $data['paramsDeliveryType'] = Type::all();
        return view('delivery.fleets.edit', ['editData' => $data]);
    }

    public function update(Request $request, $id){
        $deliveryFleet = Fleet::findOrFail($id);
        $deliveryFleet->update($request->all());
        return redirect('/delivery-fleet')->with('success', 'Fleet '.$deliveryFleet->name.' Updated');
    }

    public function delete($id){
        $deliveryFleet = Fleet::findOrFail($id);
        $name = $deliveryFleet->name;

        $deliveryFleet->delete($deliveryFleet);
        return redirect('/delivery-fleet')->with('success', 'Fleet '.$name.' Deleted');
    }
}
