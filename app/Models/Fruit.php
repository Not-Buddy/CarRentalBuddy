<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Fruit extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'color', 'price', 'quantity'];
}