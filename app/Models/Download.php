<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Download extends Model
{
    protected $table = 'downloads';

    protected $fillable = [
        'judul',
        'deskripsi',
        'kategori',
        'file_path',
        'url_eksternal',
        'thumbnail',
        'urutan',
        'aktif',
        'jumlah_download',
    ];

    protected $casts = [
        'aktif' => 'boolean',
        'jumlah_download' => 'integer',
    ];

    /** Scope: hanya item aktif, urut berdasarkan urutan */
    public function scopeAktif(Builder $query): Builder
    {
        return $query->where('aktif', 1)->orderBy('urutan');
    }

    /** URL download publik (file lokal atau eksternal) */
    public function getDownloadUrlAttribute(): string
    {
        if ($this->url_eksternal) {
            return $this->url_eksternal;
        }
        if ($this->file_path) {
            return asset('storage/' . $this->file_path);
        }
        return '#';
    }

    /** Tipe sumber: 'file' atau 'link' */
    public function getTipeAttribute(): string
    {
        return $this->file_path ? 'file' : 'link';
    }
}
