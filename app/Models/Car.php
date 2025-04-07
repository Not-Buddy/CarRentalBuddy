<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand',
        'model',
        'registration_number',
        'year',
        'rental_price_per_day',
        'seating_capacity',
        'fuel_type',
        'transmission',
        'description',
        'image_path',
    ];
}

