<?php

namespace App\Http\Controllers;

use App\Models\DeliveryFleet as Fleet;
use Illuminate\Http\Request;

class DeliveryFleetController extends Controller
{
    public function index(){
        $deliveryFleet = Fleet::all();
        return view('delivery.fleets.index', ['fleetsData' => $deliveryFleet]);
    }

    public function create(Request $request){
        Fleet::create($request->all());
        return redirect('/delivery-fleet')->with('success', 'Add Delivery Types Successfully');
    }

    public function edit($id){
        $deliveryFleet = Fleet::findOrFail($id);
        return view('delivery.fleets.edit', ['editData' => $deliveryFleet]);
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
