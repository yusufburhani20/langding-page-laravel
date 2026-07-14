<?php

namespace App\Http\Controllers;

use App\Models\Download;
use App\Models\Setting;
use App\Models\Kontak;

class DownloadController extends Controller
{
    public function index()
    {
        $settings    = Setting::allAsArray();
        $kategoriAktif = request('kategori', 'semua');

        $query = Download::aktif();
        if ($kategoriAktif !== 'semua') {
            $query->where('kategori', $kategoriAktif);
        }

        $downloads  = $query->get();
        $kategoris  = Download::aktif()->distinct()->pluck('kategori')->filter()->values();

        return view('download', [
            'downloads'      => $downloads,
            'kategoris'      => $kategoris,
            'kategoriAktif'  => $kategoriAktif,
            'site_name'      => $settings['site_name']    ?? 'TJKT SMK Fadris',
            'site_logo'      => $settings['site_logo']    ?? null,
            'site_favicon'   => $settings['site_favicon'] ?? null,
            'site_settings'  => $settings,
            'site_kontak'    => Kontak::query()->first(),
        ]);
    }

    public function download($id)
    {
        $item = Download::aktif()->findOrFail($id);

        // Increment counter
        $item->increment('jumlah_download');

        $url = $item->download_url;

        if ($item->file_path) {
            // Force download file lokal
            $fullPath = storage_path('app/public/' . $item->file_path);
            if (file_exists($fullPath)) {
                return response()->download($fullPath);
            }
        }

        // Redirect ke URL eksternal
        return redirect()->away($url);
    }
}
