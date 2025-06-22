<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSliderRequest;
use App\Http\Requests\UpdateSliderRequest;
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
    public function store(StoreSliderRequest $request)
    {
             $data = $request->validated();
             $data['is_active'] = $request->has('is_active') ? true : false;
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
    public function update(UpdateSliderRequest $slider , request $request)
    {
        $data = $request->validated();
        $data['is_active'] = $request->input('is_active' , 0);
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
