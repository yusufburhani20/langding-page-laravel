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
            'site_favicon'       => 'nullable|file|mimes:ico,png,jpg,jpeg,svg|max:1024',
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

        if ($request->hasFile('site_favicon')) {
            $path = $request->file('site_favicon')->store('uploads', 'public');
            Setting::set('site_favicon', Storage::url($path));
        }

        return back()->with('success', 'Pengaturan berhasil disimpan.');
    }

    public function gitUpdate()
    {
        try {
            $process = \Illuminate\Support\Facades\Process::run('git pull https://github.com/yusufburhani20/langding-page-laravel.git main');
            
            if ($process->successful()) {
                return back()->with('success', 'Sistem berhasil diupdate dari GitHub. Output: ' . $process->output());
            } else {
                return back()->with('error', 'Gagal melakukan update: ' . $process->errorOutput());
            }
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan saat update: ' . $e->getMessage());
        }
    }
}
