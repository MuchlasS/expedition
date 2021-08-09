<?php

namespace App\Http\Controllers;

use App\Models\DeliveryPrice as Price;
use App\Models\DeliveryArea as Area;
use App\Models\DeliveryFleet as Fleet;
use Illuminate\Http\Request;

class DeliveryPriceController extends Controller
{
    public function index(){
        $data = Price::all();
        return view('delivery.prices.index', ['deliveryPricesData' => $data]);
    }

    public function create(Request $request){
        $slug_area = explode(' ', $request->slug_area);
        $slug_fleet = explode(' ', $request->slug_fleet);
        $slug = join('_', array_merge($slug_area, $slug_fleet));
        Price::create([
            'estimation_day' => $request->estimation_day,
            'price_per_kg' => $request->price_per_kg,
            'delivery_area_id' => $request->delivery_area_id,
            'delivery_fleet_id' => $request->delivery_fleet_id,
            'slug' => $slug
        ]);
        return redirect('/delivery-price')->with('success', 'Add data successfully');
    }

    public function edit($id){
        $data = Price::findOrFail($id);
        return view('delivery.prices.edit', ['editData' => $data]);
    }

    public function update(Request $request, $id){
        $data = Price::findOrFail($id);
        $data->update($request->all());

        return redirect('/delivery-price')->with('success', 'Update '.$data->deliveryArea->area->name.' - '.$data->deliveryFleet->name.' successfully');
    }

    public function delete($id){
        $data = Price::findOrFail($id);
        $name = $data->deliveryArea->area->name.' - '.$data->deliveryFleet->name;
        $data->delete();

        return redirect('/delivery-price')->with('success', 'Delete '.$name.' successfully');
    }

    public function getAreas(Request $request){
        $areas = Area::all();
        $data = array();
        foreach($areas as $area){
            $data[] = array(
                'id' => $area->id,
                'area_name' => $area->area->name,
                'province_name' => $area->province->name,
                'city_name' => $area->city->name,
                'district_name' => $area->district->name,
                'village_name' => $area->village->name
            );
        }
        return response()->json($data);
    }

    public function getFleets(Request $request){
        $fleets = Fleet::all();
        $data = array();
        foreach($fleets as $fleet){
            $data[] = array(
                'id' => $fleet->id,
                'name' => $fleet->name,
                'delivery_type_name' => $fleet->deliveryType->name
            );
        }
        return response()->json($data);
    }
}
