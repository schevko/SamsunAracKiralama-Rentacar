<?php
use App\Models\Setting;

if (! function_exists('setting')) {
    function setting(string $key, $default = null): mixed {
        static $settingsCache = null;

        if (is_null($settingsCache)) {
            $settingsCache = Setting::pluck('value', 'key')->toArray();
        }

        return $settingsCache[$key] ?? $default;
    }
}

