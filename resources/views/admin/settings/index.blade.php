@extends('admin.layout')

@section('title', 'Pengaturan Umum')
@section('page_title', 'Pengaturan Profil Website')
@section('page_subtitle', 'Ubah teks hero, profil, dan identitas situs')

@section('content')
<div class="card">
  <div class="card-header">
    <h2 class="card-title">Konfigurasi Landing Page</h2>
  </div>
  <div class="card-body">
    <form method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      
      <div class="settings-grid">
        
        <!-- Identitas Utama -->
        <div class="settings-section">
          <h3 class="section-title-small"><i class="fas fa-info-circle"></i> Identitas Website</h3>
          
          <div class="form-group">
            <label class="form-label" for="site_name">Nama Situs Web</label>
            <input type="text" id="site_name" name="site_name" class="form-input" value="{{ old('site_name', $settings['site_name'] ?? '') }}" required>
          </div>
          
          <div class="form-group">
            <label class="form-label" for="site_tagline">Tagline Singkat</label>
            <input type="text" id="site_tagline" name="site_tagline" class="form-input" value="{{ old('site_tagline', $settings['site_tagline'] ?? '') }}">
          </div>

          <div class="form-group">
            <label class="form-label" for="instagram_username">Username Instagram Jurusan</label>
            <div style="display:flex; align-items:center; gap:0.5rem">
              <span style="background:var(--dark-surface); padding:10px; border-radius:8px; border:1px solid var(--border)">@</span>
              <input type="text" id="instagram_username" name="instagram_username" class="form-input" value="{{ old('instagram_username', $settings['instagram_username'] ?? '') }}" placeholder="contoh: santri_networkers" style="flex:1">
            </div>
            <div class="form-help">Digunakan untuk profil Galeri.</div>
          </div>
          
          <div class="form-group">
            <label class="form-label" for="site_logo">Logo Website</label>
            @if(!empty($settings['site_logo']))
              <div style="margin-bottom: 1rem; background: rgba(255,255,255,0.05); padding: 1rem; border-radius: 8px; display:inline-block">
                <img src="{{ asset($settings['site_logo']) }}" alt="Logo saat ini" style="max-height: 80px; display: block;">
              </div>
            @endif
            <input type="file" id="site_logo" name="site_logo" class="form-input" accept="image/png,image/jpeg,image/webp">
            <div class="form-help">Biarkan kosong jika tidak ingin mengubah logo. (Rec: PNG Transparan)</div>
          </div>
        </div>

        <!-- Section Hero & Profil -->
        <div class="settings-section">
          <h3 class="section-title-small"><i class="fas fa-home"></i> Section Hero & Tentang Kami</h3>

          <div class="form-group">
            <label class="form-label" for="hero_title">Judul Utama (Hero Banner)</label>
            <input type="text" id="hero_title" name="hero_title" class="form-input" value="{{ old('hero_title', $settings['hero_title'] ?? '') }}">
            <div class="form-help">Teks besar yang muncul pertama kali.</div>
          </div>

          <div class="form-group">
            <label class="form-label" for="hero_subtitle">Sub Judul (Hero Banner)</label>
            <textarea id="hero_subtitle" name="hero_subtitle" class="form-input" rows="3">{{ old('hero_subtitle', $settings['hero_subtitle'] ?? '') }}</textarea>
            <div class="form-help">Teks deskripsi di bawah judul utama.</div>
          </div>

          <div class="form-group">
            <label class="form-label" for="profil_text">Teks Profil / Tentang Kami</label>
            <textarea id="profil_text" name="profil_text" class="form-input" rows="6">{{ old('profil_text', $settings['profil_text'] ?? '') }}</textarea>
            <div class="form-help">Penjelasan singkat tentang jurusan / sekolah.</div>
          </div>
        </div>

        <!-- Section Tampilan & Tema -->
        <div class="settings-section">
          <h3 class="section-title-small"><i class="fas fa-palette"></i> Tampilan & Tema Publik</h3>

          <div class="form-group">
            <label class="form-label" for="theme_primary_color">Warna Utama (Primary)</label>
            <div style="display:flex; align-items:center; gap:1rem">
                <input type="color" id="theme_primary_color" name="theme_primary_color" value="{{ old('theme_primary_color', $settings['theme_primary_color'] ?? '#0ea5e9') }}" style="width:60px; height:45px; border:none; border-radius:8px; cursor:pointer; background:none">
                <input type="text" value="{{ old('theme_primary_color', $settings['theme_primary_color'] ?? '#0ea5e9') }}" class="form-input" style="flex:1" readonly>
            </div>
            <div class="form-help">Digunakan untuk tombol, link, dan elemen aksen utama.</div>
          </div>

          <div class="form-group">
            <label class="form-label" for="theme_secondary_color">Warna Sekunder (Secondary)</label>
            <div style="display:flex; align-items:center; gap:1rem">
                <input type="color" id="theme_secondary_color" name="theme_secondary_color" value="{{ old('theme_secondary_color', $settings['theme_secondary_color'] ?? '#10b981') }}" style="width:60px; height:45px; border:none; border-radius:8px; cursor:pointer; background:none">
                <input type="text" value="{{ old('theme_secondary_color', $settings['theme_secondary_color'] ?? '#10b981') }}" class="form-input" style="flex:1" readonly>
            </div>
            <div class="form-help">Digunakan untuk elemen pendukung dan gradien.</div>
          </div>

          <div class="form-group">
            <label class="form-label" for="theme_border_radius">Gaya Sudut (Border Radius)</label>
            <select id="theme_border_radius" name="theme_border_radius" class="form-input">
                <option value="4px" {{ (old('theme_border_radius', $settings['theme_border_radius'] ?? '16px') == '4px') ? 'selected' : '' }}>Tajam (4px)</option>
                <option value="10px" {{ (old('theme_border_radius', $settings['theme_border_radius'] ?? '16px') == '10px') ? 'selected' : '' }}>Slight Smooth (10px)</option>
                <option value="16px" {{ (old('theme_border_radius', $settings['theme_border_radius'] ?? '16px') == '16px') ? 'selected' : '' }}>Standard Rounded (16px)</option>
                <option value="24px" {{ (old('theme_border_radius', $settings['theme_border_radius'] ?? '16px') == '24px') ? 'selected' : '' }}>Extra Smooth (24px)</option>
            </select>
            <div class="form-help">Mengatur kelengkungan sudut kartu dan tombol.</div>
          </div>
        </div>

      </div>

      <div style="margin-top:2rem; padding-top:1.5rem; border-top:1px solid var(--border)">
        <button type="submit" class="btn btn-primary" style="padding: 0.8rem 2.5rem; font-size:1.1rem">
          <i class="fas fa-save"></i> Simpan Semua Pengaturan
        </button>
      </div>
    </form>
  </div>
</div>
@endsection
