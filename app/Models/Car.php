<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\CarImage;
use Illuminate\Support\Str;

class Car extends Model
{
    protected $fillable = [
        'brand',
        'model',
        'slug',
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

    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($car){
            if(empty($car->slug)){
                $car->slug = Str::slug($car->brand . '-' . $car->model . '-' . $car->year);
            }
        });

        static::updating(function ($car){
            if($car->isDirty('brand') || $car->isDirty('model')|| $car->isDirty('year')){
                $car->slug = Str::slug($car->brand . '-' . $car->model . '-' . $car->year);
            }
        });
    }
}
