@extends('admin.layout')

@section('title', 'Dashboard')
@section('page_title', 'Dashboard')
@section('page_subtitle', 'Selamat datang, ' . session('admin_nama', 'Admin'))

@section('content')
<div class="stats-grid">
  <div class="stat-card animate-on-scroll">
    <div class="stat-icon" style="background: linear-gradient(135deg, #0ea5e9, #0284c7)">
      <i class="fas fa-book-open"></i>
    </div>
    <div class="stat-info">
      <div class="number">{{ $total_kurikulum }}</div>
      <div class="label">Mata Pelajaran</div>
    </div>
  </div>
  <div class="stat-card animate-on-scroll">
    <div class="stat-icon" style="background: linear-gradient(135deg, #8b5cf6, #6d28d9)">
      <i class="fas fa-images"></i>
    </div>
    <div class="stat-info">
      <div class="number">{{ $total_galeri }}</div>
      <div class="label">Foto Galeri</div>
    </div>
  </div>
  <div class="stat-card animate-on-scroll">
    <div class="stat-icon" style="background: linear-gradient(135deg, #10b981, #059669)">
      <i class="fas fa-laptop-code"></i>
    </div>
    <div class="stat-info">
      <div class="number">{{ $total_eservice }}</div>
      <div class="label">Layanan E-Service</div>
    </div>
  </div>
  <div class="stat-card animate-on-scroll">
    <div class="stat-icon" style="background: linear-gradient(135deg, #f59e0b, #d97706)">
      <i class="fas fa-star"></i>
    </div>
    <div class="stat-info">
      <div class="number">{{ $total_keunggulan }}</div>
      <div class="label">Keunggulan</div>
    </div>
  </div>
</div>

<div class="quick-actions">
  <h2 class="section-heading">Akses Cepat</h2>
  <div class="quick-grid">
    <a href="{{ route('admin.settings.index') }}" class="quick-card" id="quick-settings">
      <i class="fas fa-cog"></i>
      <span>Pengaturan</span>
    </a>
    <a href="{{ route('admin.kurikulum.index') }}" class="quick-card" id="quick-kurikulum">
      <i class="fas fa-book-open"></i>
      <span>Kurikulum</span>
    </a>
    <a href="{{ route('admin.galeri.index') }}" class="quick-card" id="quick-galeri">
      <i class="fas fa-images"></i>
      <span>Galeri</span>
    </a>
    <a href="{{ route('admin.eservice.index') }}" class="quick-card" id="quick-eservice">
      <i class="fas fa-laptop-code"></i>
      <span>E-Service</span>
    </a>
    <a href="{{ route('admin.keunggulan.index') }}" class="quick-card" id="quick-keunggulan">
      <i class="fas fa-star"></i>
      <span>Keunggulan</span>
    </a>
    <a href="{{ route('admin.kontak.edit') }}" class="quick-card" id="quick-kontak">
      <i class="fas fa-phone-alt"></i>
      <span>Kontak</span>
    </a>
  </div>
</div>
@endsection
