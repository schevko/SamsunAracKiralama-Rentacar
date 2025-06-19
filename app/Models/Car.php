<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\CarImage;

class Car extends Model
{
    protected $fillable = [
        'brand',
        'model',
        'year',
        'daily_price',
        'transmission_type',
        'fuel_type',
        'seat_count',
        'luggage_capacity',
        'description',
        'is_active',
    ];

    public function images(){
        return $this->hasMany(CarImage::class)->orderBy('order');
    }
}
