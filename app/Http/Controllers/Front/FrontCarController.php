<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;

class FrontCarController extends Controller
{
    public function index()
    {
        $cars = Car::where('is_active' , true)->latest()->paginate(10);
        return view('Front.Car.index', compact('cars'));
    }

    public function show(car $car)
    {
              abort_unless($car->is_active, 404); // inaktif araçlar gösterilmesin

        $similarCars = Car::where('brand', $car->brand)
                          ->where('id', '!=', $car->id)
                          ->where('is_active', true)
                          ->take(4)
                          ->get();

        return view('Front.Car.show', compact('car', 'similarCars'));
    }
}
