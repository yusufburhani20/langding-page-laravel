<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Download;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{
    public function index()
    {
        $data = Download::orderBy('urutan')->orderBy('created_at', 'desc')->get();
        return view('admin.downloads.index', compact('data'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul'          => 'required|string|max:255',
            'deskripsi'      => 'nullable|string|max:1000',
            'kategori'       => 'nullable|string|max:100',
            'url_eksternal'  => 'nullable|url|max:500',
            'file'           => 'nullable|file|max:51200', // maks 50 MB
            'urutan'         => 'nullable|integer',
            'aktif'          => 'nullable|boolean',
        ]);

        $filePath = null;
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('downloads', 'public');
        }

        Download::create([
            'judul'          => $validated['judul'],
            'deskripsi'      => $validated['deskripsi'] ?? null,
            'kategori'       => $validated['kategori'] ?? 'Umum',
            'file_path'      => $filePath,
            'url_eksternal'  => $validated['url_eksternal'] ?? null,
            'urutan'         => $validated['urutan'] ?? 0,
            'aktif'          => $request->has('aktif') ? 1 : 0,
        ]);

        return back()->with('success', 'File download berhasil ditambahkan.');
    }

    public function update(Request $request, Download $download)
    {
        $validated = $request->validate([
            'judul'          => 'required|string|max:255',
            'deskripsi'      => 'nullable|string|max:1000',
            'kategori'       => 'nullable|string|max:100',
            'url_eksternal'  => 'nullable|url|max:500',
            'file'           => 'nullable|file|max:51200',
            'urutan'         => 'nullable|integer',
            'aktif'          => 'nullable|boolean',
        ]);

        $filePath = $download->file_path;

        if ($request->hasFile('file')) {
            // Hapus file lama jika ada
            if ($filePath) {
                Storage::disk('public')->delete($filePath);
            }
            $filePath = $request->file('file')->store('downloads', 'public');
        }

        // Jika user mengganti ke URL eksternal, hapus file lokal
        if (!empty($validated['url_eksternal']) && $filePath) {
            Storage::disk('public')->delete($filePath);
            $filePath = null;
        }

        $download->update([
            'judul'          => $validated['judul'],
            'deskripsi'      => $validated['deskripsi'] ?? null,
            'kategori'       => $validated['kategori'] ?? 'Umum',
            'file_path'      => $filePath,
            'url_eksternal'  => $validated['url_eksternal'] ?? null,
            'urutan'         => $validated['urutan'] ?? 0,
            'aktif'          => $request->has('aktif') ? 1 : 0,
        ]);

        return back()->with('success', 'Data download berhasil diperbarui.');
    }

    public function destroy(Download $download)
    {
        if ($download->file_path) {
            Storage::disk('public')->delete($download->file_path);
        }
        $download->delete();
        return back()->with('success', 'Data download berhasil dihapus.');
    }
}
