<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\CarImage;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::latest()->get();
        return view('admin.car.index', compact('cars'));
    }

    public function create()
    {
        return view('admin.car.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'daily_price' => 'required|numeric|min:0',
            'transmission_type' => 'required|string|in:manual,automatic',
            'fuel_type' => 'required|string|in:petrol,diesel,electric,hybrid',
            'seat_count' => 'required|integer|min:1|max:10',
            'luggage_capacity' => 'required|integer|min:0',
            'description' => 'nullable|string|max:1000',
            'is_active' => 'boolean',
            'images' => 'nullable|array',
            'images.*' => 'image|max:2048'
        ]);

        $car = Car::create($data);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $file) {
                $path = $file->store('car_images', 'public');

                $car->images()->create([
                    'path' => $path,
                    'order' => $index,
                    'is_thumbnail' => $index === 0,
                ]);
            }
        }

        return redirect()->route('admin.car.index')->with('success', 'Araç Bilgileri Eklendi');
    }

    public function edit(Car $car)
    {
        return view('admin.car.edit', compact('car'));
    }

    public function update(Request $request, Car $car)
    {
        $data = $request->validate([
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'daily_price' => 'required|numeric|min:0',
            'transmission_type' => 'required|string|in:manual,automatic',
            'fuel_type' => 'required|string|in:petrol,diesel,electric,hybrid',
            'seat_count' => 'required|integer|min:1|max:10',
            'luggage_capacity' => 'required|integer|min:0',
            'description' => 'nullable|string|max:1000',
        ]);
        $data['is_active'] = $request->input('is_active' , false);
        $car->update($data);
        return redirect()->route('admin.car.index')->with('success', 'Araç Bilgileri Güncellendi');
    }

    public function destroy(Car $car)
    {
        foreach ($car->images as $image) {
            if ($image->path) {
                Storage::disk('public')->delete($image->path);
            }
            $image->delete();
        }
        $car->delete();
        return redirect()->route('admin.car.index')->with('success', 'Araç Silindi');
    }
}
