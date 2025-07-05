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
        $keys = ['site_title', 'whatsapp', 'contact_email', 'contact_address', 'footer_text' , 'site_description'];

        foreach ($keys as $key) {
            Setting::updateOrCreate(['key' => $key], ['value' => $request->input($key)]);
        }

        // Logo yükleme işlemi
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $path = $logo->store('uploads/settings', 'public');

            // Eski logo varsa sil
            $old = Setting::where('key', 'logo')->value('value');
            if ($old && Storage::disk('public')->exists($old)) {
                Storage::disk('public')->delete($old);
            }

            Setting::updateOrCreate(['key' => 'logo'], ['value' => $path]);
        }

        cache()->forget('settings'); // Cache temizle
        return back()->with('success', 'Ayarlar başarıyla güncellendi.');
    }
}

