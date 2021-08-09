<?php

namespace App\Models;

use App\Models\Area;
use Laravolt\Indonesia\Models\Province;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Village;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryArea extends Model
{
    protected $table = 'delivery_areas';
    protected $fillable = [
        'area_id',
        'province_id',
        'city_id',
        'district_id',
        'village_id'
    ];
    use HasFactory;

    public function area(){
        return $this->belongsTo(Area::class);
    }

    public function province(){
        return $this->belongsTo(Province::class);
    }

    public function city(){
        return $this->belongsTo(City::class);
    }

    public function district(){
        return $this->belongsTo(District::class);
    }

    public function village(){
        return $this->belongsTo(Village::class);
    }
}
