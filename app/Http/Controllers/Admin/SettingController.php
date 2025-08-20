<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function edit()
    {
        return view('admin.setting.edit');
    }

    public function update(Request $request)
    {
        $textSettings = [
            'site_title',
            'whatsapp',
            'contact_email',
            'contact_address',
            'footer_text',
            'site_description',
            'phone'
        ];

        foreach ($textSettings as $key) {
            Setting::updateOrCreate(['key' => $key], ['value' => $request->input($key)]);
        }

        // Logo yükleme işlemi - sadece yeni dosya yüklendiğinde güncelle
        if ($request->hasFile('logo') && $request->file('logo')->isValid()) {
            // Eski logoyu silme
            $oldLogoSetting = Setting::where('key', 'logo')->first();
            if ($oldLogoSetting && $oldLogoSetting->value) {
                Storage::disk('public')->delete($oldLogoSetting->value);
            }

            $logo = $request->file('logo');
            $path = $logo->store('uploads/settings', 'public');

            Setting::updateOrCreate(['key' => 'logo'], ['value' => $path]);
        }

        cache()->forget('settings'); // Cache temizle
        return back()->with('success', 'Ayarlar başarıyla güncellendi.');
    }
}

