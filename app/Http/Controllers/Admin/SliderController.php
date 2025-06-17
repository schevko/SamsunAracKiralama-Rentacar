<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::orderBy('order')->get();
        return view('admin.slider.index' , compact('sliders'));
    }
    public function create()
    {
        return view('admin.slider.create');
    }
    public function store(Request $request)
    {
             $data = $request->validate([
            'image' => 'required|image|max:5096',
            'title' => 'nullable|string',
            'description' => 'nullable|string',
            'link' => 'nullable|string',
            'order' => 'required|integer|min:0',
            'is_active' => 'boolean',
             ]);
             if($request->hasFile('image')){
                $data['image_path'] = $request->file('image')->store('uploads/sliders' , 'public');
             }

             Slider::create($data);
             return redirect()->route('admin.slider.index')->with('success' , 'slider Oluşturuldu');
    }
    public function edit(Slider $slider)
    {
        return view('admin.slider.edit' , compact('slider'));
    }
    public function update(Slider $slider , request $request)
    {
             $data = $request->validate([
            'image' => 'required|image|max:5096',
            'title' => 'nullable|string',
            'description' => 'nullable|string',
            'link' => 'nullable|string',
            'order' => 'required|integer|min:0',
            'is_active' => 'boolean',
        ]);
                if ($request->hasFile('image')) {
            if ($slider->image_path) {
                Storage::disk('public')->delete($slider->image_path);
            }
            $data['image_path'] = $request->file('image')->store('uploads/sliders', 'public');
        }
       $slider->update($data);
        return redirect()->route('admin.slider.index')->with('success' , 'Slider Güncellendi');
    }
    public function destroy(Slider $slider)
    {
          if ($slider->image_path) {
            Storage::disk('public')->delete($slider->image_path);
        }
        $slider->delete();
        return redirect()->route('admin.slider.index');
    }
}
