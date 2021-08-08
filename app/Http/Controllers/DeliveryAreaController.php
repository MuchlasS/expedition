<?php

namespace App\Http\Controllers;

use App\Models\DeliveryArea;
use App\Models\Area;
use Laravolt\Indonesia\Models\Province;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Village;
use Illuminate\Http\Request;

class DeliveryAreaController extends Controller
{
    public function index(){
        $data['provinces'] = Province::pluck('name', 'id');
        $data['areas'] = Area::pluck('name', 'id');
        $data['main'] = DeliveryArea::all();
        // return $data;

        return view('delivery.areas.index', ['data' => $data]);
    }

    public function create(Request $request){
        // return $request;
        DeliveryArea::create($request->all());
        return redirect('/delivery-area')->with('success', 'Add delivery area successfully');
    }

    public function edit($id){
        $data['main'] = DeliveryArea::findOrFail($id);
        $data['areas'] = Area::pluck('name', 'id');
        
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

    public function getProvinces(Request $request){
        $province = Province::all()->pluck('name', 'id');

        return response()->json($province);
    }

    public function getCities(Request $request){
        $city = City::where('province_id', $request->get('id'))->pluck('name', 'id');

        return response()->json($city);
    }

    public function getDistricts(Request $request){
        $district = District::where('city_id', $request->get('id'))->pluck('name', 'id');

        return response()->json($district);
    }

    public function getVillages(Request $request){
        $village = Village::where('district_id', $request->get('id'))->pluck('name', 'id');

        return response()->json($village);
    }
}
