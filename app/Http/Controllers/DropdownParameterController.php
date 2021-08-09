<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\DeliveryArea;
use App\Models\DeliveryFleet as Fleet;
use Laravolt\Indonesia\Models\Province;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Village;
use Illuminate\Http\Request;

class DropdownParameterController extends Controller
{
    public function getAreas(Request $request){
        $data = Area::all()->pluck('name', 'id');
        
        return response()->json($data);
    }

    public function getDeliveryAreas(Request $request){
        $areas = DeliveryArea::all();
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

    public function getProvinces(Request $request){
        $data = Province::all()->pluck('name', 'id');

        return response()->json($data);
    }

    public function getCities(Request $request){
        $data = City::where('province_id', $request->get('id'))->pluck('name', 'id');

        return response()->json($data);
    }

    public function getDistricts(Request $request){
        $data = District::where('city_id', $request->get('id'))->pluck('name', 'id');

        return response()->json($data);
    }

    public function getVillages(Request $request){
        $data = Village::where('district_id', $request->get('id'))->pluck('name', 'id');

        return response()->json($data);
    }
}
