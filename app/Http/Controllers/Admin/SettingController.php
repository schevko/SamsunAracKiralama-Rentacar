<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    public function edit()
    {
        $settings = Setting::pluck('value' , 'key')->toArray();
        return view('admin.setting.edit' , compact('settings'));
    }
    public function update(Request $request)
    {
        $data = $request->except('_token');
        foreach ($data as $key => $value){
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value],
            );
        }
        return redirect()->route('admin.setting.edit')->with('success', 'Ayarlar Başarıyla Güncellendi');
    }
}
