<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = ['car_id', 'user_id', 'booking_date', 'status'];
    //
}
