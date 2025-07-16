<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\CarImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;



class CarImageController extends Controller
{
public function store(Request $request, Car $car)
{
    $request->validate([
        'images' => 'required|array',
        'images.*' => 'required|image|max:2048',
    ]);

    foreach ($request->file('images') as $index => $file) {
        try {
            $path = $file->store('car_images', 'public');
            $car->images()->create([
                'path' => $path,
                'order' => $car->images()->max('order') + 1 + $index,
                'is_thumbnail' => $car->images()->count() === 0 && $index === 0,
            ]);
        } catch (\Exception $e) {
            dd('HATA: ' . $e->getMessage());
        }
    }

    return back()->with('success', 'Görseller başarıyla yüklendi.');
}

    public function destroy(CarImage $image)
    {
        if($image->path){
            Storage::disk('public')->delete($image->path);
        }
        $image->delete();
        return back()->with('success' ,'Resim Başarıyla Silindi');
    }
 public function setThumbnail(CarImage $image)
{
    CarImage::where('car_id', $image->car_id)->update(['is_thumbnail' => false]);
    $result = $image->update(['is_thumbnail' => true]);
    if (!$result) {
        Log::error('Kapak resmi güncellenemedi', ['image_id' => $image->id]);
        return back()->with('error', 'Kapak resmi güncellenemedi!');
    }
    return back()->with('success', 'Kapak Resmi Başarıyla Ayarlandı');
}
}
