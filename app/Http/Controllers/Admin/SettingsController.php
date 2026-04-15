<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    public function index()
    {
        $settings = Setting::allAsArray();
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'hero_title'         => 'nullable|string|max:200',
            'hero_subtitle'      => 'nullable|string|max:500',
            'profil_text'        => 'nullable|string',
            'instagram_username' => 'nullable|string|max:100',
            'site_name'          => 'nullable|string|max:100',
            'site_tagline'       => 'nullable|string|max:200',
            'site_logo'          => 'nullable|image|max:2048',
            'theme_primary_color'   => 'nullable|string|max:20',
            'theme_secondary_color' => 'nullable|string|max:20',
            'theme_border_radius'   => 'nullable|string|max:20',
        ]);

        $keys = [
            'hero_title', 'hero_subtitle', 'profil_text', 'instagram_username', 
            'site_name', 'site_tagline', 'theme_primary_color', 
            'theme_secondary_color', 'theme_border_radius'
        ];

        foreach ($keys as $key) {
            if ($request->has($key)) {
                Setting::set($key, $request->input($key) ?? '');
            }
        }

        if ($request->hasFile('site_logo')) {
            $path = $request->file('site_logo')->store('uploads', 'public');
            Setting::set('site_logo', Storage::url($path));
        }

        return back()->with('success', 'Pengaturan berhasil disimpan.');
    }
}
