<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;
use Illuminate\Support\Str;

class FrontCarController extends Controller
{
    public function index(Request $request)
    {
        $query = Car::where('is_active' , true);
        if ($request->filled('min_price')) {
            $query->where('daily_price' , '>=' , $request->input('min_price'));
        }
        if ($request->filled('max_price')) {
            $query->where('daily_price' , '<=' , $request->input('max_price'));
        }
        if($request->filled('transmission_type')){
            $query->where('transmission_type', $request->input('transmission_type'));
        }
        $cars = $query->latest()->paginate(20);
        return view('front.car.index', [
            'cars' => $cars,
            'meta_title' => 'Araçlar' . ' | ' . setting('site_title'),
            'meta_description' => 'Geniş araç filomuzla sizlere en iyi deneyimi sunuyoruz. Araçlarımızı inceleyin ve rezervasyon yapın.',
        ]);
    }

    public function show(car $car)
    {
              abort_unless($car->is_active, 404);

        $similarCars = Car::where('brand', $car->brand)
                          ->where('id', '!=', $car->id)
                          ->where('is_active', true)
                          ->take(4)
                          ->get();

        return view('front.car.show', [
            'car' => $car,
            'similarCars' => $similarCars,
            'meta_title' => $car->brand . ' ' . $car->model . ' | ' . setting('site_title'),
            'meta_description' => Str::limit($car->description,150),
        ]);
    }
}
