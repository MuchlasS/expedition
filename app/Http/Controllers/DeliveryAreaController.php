<?php

namespace App\Http\Controllers;

use Laravolt\Indonesia\Models\Province;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Village;
use Illuminate\Http\Request;

class DeliveryAreaController extends Controller
{
    public function index(){
        $provinces = Province::pluck('name', 'id');
        // return $provinces;

        return view('delivery.areas.index', ['data' => $provinces]);
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
