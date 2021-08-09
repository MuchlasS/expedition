<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryPrice extends Model
{
    protected $table = 'delivery_prices';
    protected $fillable = [
        'estimation_day',
        'price_per_kg',
        'slug',
        'delivery_fleet_id',
        'delivery_area_id'
    ];
    use HasFactory;

    public function deliveryFleet(){
        return $this->belongsTo(DeliveryFleet::class);
    }

    public function deliveryArea(){
        return $this->belongsTo(DeliveryArea::class);
    }
}
