<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCarRequest;
use App\Http\Requests\UpdateCarRequest;
use Illuminate\Http\Request;
use App\Models\Car;
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

    public function store(StoreCarRequest $request)
    {
        $car = Car::create($request->validated());
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

    public function update(UpdateCarRequest $request, Car $car)
    {
        $data = $request->validated();
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
