<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryFleet extends Model
{
    protected $table = 'delivery_fleets';
    protected $fillable = [
        'name',
        'delivery_type_id'
    ];
    use HasFactory;
}
