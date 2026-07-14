@extends('layout')

@section('title', 'Pusat Download')

@push('styles')
<style>
/* ===== DOWNLOAD PAGE ===== */
.download-hero {
  background: linear-gradient(135deg, var(--primary, #0F2447) 0%, #1a3a6e 60%, #00C8FF22 100%);
  padding: 100px 0 60px;
  text-align: center;
  position: relative;
  overflow: hidden;
}
.download-hero::before {
  content: '';
  position: absolute;
  inset: 0;
  background: radial-gradient(ellipse 70% 60% at 50% 100%, rgba(0,200,255,.15) 0%, transparent 70%);
  pointer-events: none;
}
.download-hero-eyebrow {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  background: rgba(0,200,255,.15);
  border: 1px solid rgba(0,200,255,.35);
  color: #00C8FF;
  font-size: 13px;
  font-weight: 600;
  letter-spacing: .06em;
  padding: 6px 16px;
  border-radius: 100px;
  margin-bottom: 20px;
}
.download-hero-title {
  font-size: clamp(2rem, 5vw, 3.2rem);
  font-weight: 800;
  color: #fff;
  line-height: 1.15;
  margin-bottom: 16px;
}
.download-hero-sub {
  color: rgba(255,255,255,.7);
  font-size: 1.05rem;
  max-width: 540px;
  margin: 0 auto;
}

/* ===== FILTER TABS ===== */
.download-section {
  padding: 60px 0 80px;
  background: var(--bg, #F4F7FC);
}
.download-filter {
  display: flex;
  flex-wrap: wrap;
  gap: 10px;
  justify-content: center;
  margin-bottom: 40px;
}
.download-filter-btn {
  padding: 8px 20px;
  border-radius: 100px;
  border: 1.5px solid rgba(15,36,71,.15);
  background: #fff;
  color: var(--primary, #0F2447);
  font-weight: 600;
  font-size: 14px;
  cursor: pointer;
  transition: all .2s;
  text-decoration: none;
}
.download-filter-btn:hover,
.download-filter-btn.active {
  background: var(--primary, #0F2447);
  color: #fff;
  border-color: var(--primary, #0F2447);
}

/* ===== DOWNLOAD GRID ===== */
.download-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
  gap: 24px;
}
.download-card {
  background: #fff;
  border-radius: 16px;
  border: 1.5px solid rgba(15,36,71,.08);
  padding: 24px;
  display: flex;
  flex-direction: column;
  gap: 14px;
  transition: transform .25s, box-shadow .25s, border-color .25s;
  position: relative;
  overflow: hidden;
}
.download-card::before {
  content: '';
  position: absolute;
  top: 0; left: 0; right: 0;
  height: 3px;
  background: linear-gradient(90deg, var(--primary, #0F2447), #00C8FF);
  transform: scaleX(0);
  transform-origin: left;
  transition: transform .3s;
}
.download-card:hover {
  transform: translateY(-4px);
  box-shadow: 0 16px 40px rgba(15,36,71,.12);
  border-color: rgba(15,36,71,.15);
}
.download-card:hover::before {
  transform: scaleX(1);
}
.download-card-icon {
  width: 52px;
  height: 52px;
  border-radius: 14px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 22px;
  background: linear-gradient(135deg, rgba(15,36,71,.08), rgba(0,200,255,.1));
  flex-shrink: 0;
}
.download-card-header {
  display: flex;
  align-items: flex-start;
  gap: 14px;
}
.download-card-meta {
  flex: 1;
}
.download-card-title {
  font-weight: 700;
  font-size: 1rem;
  color: var(--primary, #0F2447);
  line-height: 1.35;
  margin-bottom: 4px;
}
.download-card-kat {
  display: inline-block;
  padding: 2px 10px;
  border-radius: 100px;
  font-size: 11px;
  font-weight: 700;
  letter-spacing: .04em;
  background: rgba(0,200,255,.12);
  color: #007ea0;
  border: 1px solid rgba(0,200,255,.25);
}
.download-card-desc {
  font-size: 0.875rem;
  color: #666;
  line-height: 1.6;
  flex: 1;
}
.download-card-footer {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding-top: 14px;
  border-top: 1px solid rgba(15,36,71,.07);
  gap: 10px;
}
.download-card-counter {
  font-size: 12px;
  color: #999;
  display: flex;
  align-items: center;
  gap: 5px;
}
.download-card-counter i {
  font-size: 10px;
}
.download-btn {
  display: inline-flex;
  align-items: center;
  gap: 7px;
  padding: 9px 18px;
  background: linear-gradient(135deg, var(--primary, #0F2447), #1a3a6e);
  color: #fff;
  border-radius: 8px;
  font-size: 13px;
  font-weight: 700;
  text-decoration: none;
  transition: opacity .2s, transform .2s;
  white-space: nowrap;
}
.download-btn:hover {
  opacity: .88;
  transform: translateY(-1px);
}
.download-btn.btn-ext {
  background: linear-gradient(135deg, #0891b2, #0ea5e9);
}
.download-empty {
  text-align: center;
  padding: 60px 20px;
  color: #999;
  grid-column: 1 / -1;
}
.download-empty i {
  font-size: 48px;
  margin-bottom: 16px;
  opacity: .4;
  display: block;
}
</style>
@endpush

@section('content')

{{-- HERO --}}
<section class="download-hero">
  <div class="container" style="position:relative; z-index:1;">
    <div class="download-hero-eyebrow">
      <i class="fas fa-download"></i>
      Pusat Download
    </div>
    <h1 class="download-hero-title">📥 Pusat Download</h1>
    <p class="download-hero-sub">Unduh modul, formulir, panduan, dan dokumen resmi jurusan TJKT SMK Fadris secara gratis.</p>
  </div>
</section>

{{-- FILTER + GRID --}}
<section class="download-section">
  <div class="container">

    {{-- Filter tabs --}}
    @if($kategoris->isNotEmpty())
    <div class="download-filter">
      <a href="{{ route('download.index') }}"
         class="download-filter-btn {{ $kategoriAktif === 'semua' ? 'active' : '' }}">
        Semua
      </a>
      @foreach($kategoris as $kat)
      <a href="{{ route('download.index', ['kategori' => $kat]) }}"
         class="download-filter-btn {{ $kategoriAktif === $kat ? 'active' : '' }}">
        {{ $kat }}
      </a>
      @endforeach
    </div>
    @endif

    {{-- Grid --}}
    <div class="download-grid">
      @forelse($downloads as $i => $item)
      @php
        $icons = ['📄','📚','📋','📊','🗂️','📑','🔖','📝'];
        $icon  = $icons[$i % count($icons)];
        $isFile = !empty($item->file_path);
      @endphp
      <div class="download-card animate-on-scroll" style="animation-delay: {{ $i * 0.05 }}s">
        <div class="download-card-header">
          <div class="download-card-icon">{{ $icon }}</div>
          <div class="download-card-meta">
            <div class="download-card-title">{{ $item->judul }}</div>
            <span class="download-card-kat">{{ $item->kategori ?? 'Umum' }}</span>
          </div>
        </div>
        @if($item->deskripsi)
        <p class="download-card-desc">{{ $item->deskripsi }}</p>
        @endif
        <div class="download-card-footer">
          <div class="download-card-counter">
            <i class="fas fa-download"></i>
            {{ number_format($item->jumlah_download) }}× diunduh
          </div>
          <a href="{{ route('download.get', $item->id) }}"
             class="download-btn {{ $isFile ? '' : 'btn-ext' }}"
             {{ $isFile ? '' : 'target="_blank" rel="noopener"' }}>
            <i class="fas fa-{{ $isFile ? 'file-download' : 'external-link-alt' }}"></i>
            {{ $isFile ? 'Unduh' : 'Buka Link' }}
          </a>
        </div>
      </div>
      @empty
      <div class="download-empty">
        <i class="fas fa-folder-open"></i>
        <p>Belum ada file yang tersedia untuk kategori ini.</p>
      </div>
      @endforelse
    </div>

  </div>
</section>

@endsection
