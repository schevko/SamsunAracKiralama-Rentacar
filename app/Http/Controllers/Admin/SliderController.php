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
        return view('admin.slider.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.slider.create');
    }

    public function store(Request $request)
    {
         $request->validate([
            'image_path' => 'required|image|max:5096',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'link' => 'nullable|url',
            'order' => 'required|integer',
            'is_active'=> 'boolean',
        ]);
        $path = $request->file('image_path')->store('sliders' , 'public');
        Slider::create([
            'image_path'=>$path,
            'title'=>$request->title,
            'description'=>$request->description,
            'link'=>$request->link,
            'order'=>$request->order,
            'is_active'=>$request->is_active ?? false
        ]);

        return redirect()->route('admin.slider.index')->with('success' , 'Slider Eklendi');
    }

    public function edit(slider $slider)
    {
        return view('admin.slider.edit', compact('slider'));
    }

    public function update(Slider $slider , request $request)
    {
        $request->validate([
        'image_path' => 'nullable|image|max:2048',
        'title' => 'nullable|string|max:255',
        'description' => 'nullable|string',
        'link' => 'nullable|url',
        'order' => 'required|integer|min:0',
        'is_active' => 'boolean'
    ]);

    if($request->file('image_path')){
        Storage::disk('public')->delete($slider->image_path);
        $slider->image_path = $request->file('image_path')->store('sliders' ,'public');
    }
            $slider->title = $request->title;
            $slider->description = $request->description;
            $slider->link = $request->link;
            $slider->order = $request->order;
            $slider->is_active = $request->is_active ?? false;
            $slider->save();
            return redirect()->route('admin.slider.index')->with('success' , 'Slider Güncellendi');
    }
}
