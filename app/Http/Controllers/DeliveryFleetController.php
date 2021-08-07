<?php

namespace App\Http\Controllers;

use App\Models\DeliveryFleet as Fleet;
use App\Models\DeliveryType as Type;
use Illuminate\Http\Request;

class DeliveryFleetController extends Controller
{
    public function index(){
        $data['fleets'] = Fleet::all();
        $data['types'] = Type::all();
        return view('delivery.fleets.index', ['deliveryFleetsData' => $data]);
    }

    public function create(Request $request){
        Fleet::create($request->all());
        return redirect('/delivery-fleet')->with('success', 'Add delivery fleet successfully');
    }

    public function edit($id){
        $data['fleets'] = Fleet::findOrFail($id);
        $data['types'] = Type::all();

        return view('delivery.fleets.edit', ['editData' => $data]);
    }

    public function update(Request $request, $id){
        $data = Fleet::findOrFail($id);
        $data->update($request->all());

        return redirect('/delivery-fleet')->with('success', 'Fleet '.$data->name.' updated');
    }

    public function delete($id){
        $data = Fleet::findOrFail($id);
        $name = $data->name;
        $data->delete();

        return redirect('/delivery-fleet')->with('success', 'Fleet '.$name.' deleted');
    }
}
