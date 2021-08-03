<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfficeUserInfo extends Model
{
    protected $table = 'office_user_infos';
    protected $fillable = [
        'office_name',
        'office_telephone',
        'office_address',
        'user_id'
    ];
    use HasFactory;
}
