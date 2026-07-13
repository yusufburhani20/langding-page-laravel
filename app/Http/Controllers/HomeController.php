<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Kurikulum;
use App\Models\Galeri;
use App\Models\Eservice;
use App\Models\Keunggulan;
use App\Models\Kontak;
use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        $settings = Setting::allAsArray();

        return view('landing', [
            'hero_title'    => $settings['hero_title']   ?? 'Selamat Datang di TJKT SMK Fadris',
            'hero_subtitle' => $settings['hero_subtitle'] ?? 'Bergabunglah bersama sekolah vokasi unggulan',
            'profil_text'   => $settings['profil_text']   ?? '',
            'ig_username'   => $settings['instagram_username'] ?? 'santri_networkers',
            'site_name'     => $settings['site_name']     ?? 'TJKT SMK Fadris',
            'site_logo'     => $settings['site_logo']     ?? null,
            'kurikulum'     => Kurikulum::aktif()->get(),
            'galeri'        => Galeri::aktif()->get(),
            'eservice'      => Eservice::aktif()->get(),
            'keunggulan'    => Keunggulan::aktif()->get(),
            'kontak'        => Kontak::query()->first(),
            'latest_posts'  => Post::with('category', 'author', 'images')
                                   ->where('status', 'published')
                                   ->latest()
                                   ->take(3)
                                   ->get(),
        ]);
    }
}
