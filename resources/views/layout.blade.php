<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title') – {{ $site_name ?? 'TJKT SMK Fadris' }}</title>
  <meta name="description" content="Jurusan TJKT SMK Fadris – sekolah vokasi unggulan yang mencetak lulusan terampil, berdaya saing tinggi, dan siap kerja di bidang teknologi jaringan." />
  <meta name="keywords" content="TJKT, SMK Fadris, Teknik Jaringan, Komputer, Telekomunikasi, Sekolah Vokasi" />

  <link rel="canonical" href="{{ url()->current() }}" />

  {{-- OpenGraph --}}
  <meta property="og:type" content="website" />
  <meta property="og:url" content="{{ url()->current() }}" />
  <meta property="og:title" content="@yield('title') – {{ $site_name ?? 'TJKT' }}" />
  
  <link rel="icon" type="image/x-icon" href="{{ isset($site_favicon) && !empty($site_favicon) ? asset($site_favicon) : asset('favicon.ico') }}" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}?v={{ file_exists(public_path('assets/css/style.css')) ? filemtime(public_path('assets/css/style.css')) : time() }}" />
  
  {{-- Dynamic Theme Styling --}}
  <style>
    :root {
      --primary: {{ $site_settings['theme_primary_color'] ?? '#0ea5e9' }};
      --secondary: {{ $site_settings['theme_secondary_color'] ?? '#10b981' }};
      --radius-lg: {{ $site_settings['theme_border_radius'] ?? '24px' }};
      @if(isset($site_settings['theme_primary_color']))
        --hero-gradient: linear-gradient(135deg, {{ $site_settings['theme_primary_color'] }} 0%, #1b6ca8 30%, {{ $site_settings['theme_primary_color'] }} 60%, {{ $site_settings['theme_secondary_color'] ?? '#10b981' }} 100%);
      @endif
    }
    .btn-primary:hover, .btn-secondary:hover {
        filter: brightness(1.1);
    }
  </style>

  @stack('styles')
</head>
<body>

<!-- ===== NAVBAR ===== -->
<nav class="navbar" id="navbar" role="navigation" aria-label="Main Navigation">
  <div class="navbar-inner">
    <a href="{{ route('home') }}" class="navbar-brand" aria-label="{{ $site_name ?? 'Home' }}">
      <div class="navbar-logo" @if(isset($site_logo) && !empty($site_logo)) style="background: transparent; border-radius: 0; width: auto; height: 42px;" @endif>
        @if(isset($site_logo) && !empty($site_logo))
          <img src="{{ asset($site_logo) }}" alt="Logo" style="max-height:100%; max-width:100%; object-fit:contain;">
        @else
          TJ
        @endif
      </div>
      <div class="navbar-title">
        <span>{{ $site_name ?? 'TJKT SMK Fadris' }}</span>
        <span>Teknik Jaringan &amp; Komputer</span>
      </div>
    </a>
    <ul class="navbar-nav" role="list">
      <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a></li>
      <li><a href="{{ request()->routeIs('home') ? '#profil' : route('home') . '#profil' }}">Profil</a></li>
      <li><a href="{{ request()->routeIs('home') ? '#kurikulum' : route('home') . '#kurikulum' }}">Kurikulum</a></li>
      <li><a href="{{ request()->routeIs('home') ? '#eservice' : route('home') . '#eservice' }}">E-Service</a></li>
      <li><a href="{{ request()->routeIs('home') ? '#galeri' : route('home') . '#galeri' }}">Galeri</a></li>
      <li><a href="{{ request()->routeIs('home') ? '#keunggulan' : route('home') . '#keunggulan' }}">Keunggulan</a></li>
      <li><a href="{{ route('blog.index') }}" class="{{ request()->routeIs('blog.*') ? 'active' : '' }}">Blog</a></li>
      <li><a href="{{ route('download.index') }}" class="{{ request()->routeIs('download.*') ? 'active' : '' }}">Download</a></li>
      <li><a href="{{ request()->routeIs('home') ? '#kontak' : route('home') . '#kontak' }}">Kontak</a></li>
      <li><a href="{{ request()->routeIs('home') ? '#kontak' : route('home') . '#kontak' }}" class="nav-cta-btn">Daftar Sekarang</a></li>
    </ul>
    <button class="navbar-toggle" id="navbarToggle" aria-label="Toggle navigation" aria-expanded="false">
      <span></span><span></span><span></span>
    </button>
  </div>
</nav>

<!-- Mobile Menu -->
<div class="mobile-menu" id="mobileMenu" role="navigation" aria-label="Mobile Navigation">
  <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
  <a href="{{ request()->routeIs('home') ? '#profil' : route('home') . '#profil' }}">Profil</a>
  <a href="{{ request()->routeIs('home') ? '#kurikulum' : route('home') . '#kurikulum' }}">Kurikulum</a>
  <a href="{{ request()->routeIs('home') ? '#eservice' : route('home') . '#eservice' }}">E-Service</a>
  <a href="{{ request()->routeIs('home') ? '#galeri' : route('home') . '#galeri' }}">Galeri</a>
  <a href="{{ request()->routeIs('home') ? '#keunggulan' : route('home') . '#keunggulan' }}">Keunggulan</a>
  <a href="{{ route('blog.index') }}" class="{{ request()->routeIs('blog.*') ? 'active' : '' }}">Berita</a>
  <a href="{{ route('download.index') }}" class="{{ request()->routeIs('download.*') ? 'active' : '' }}">Download</a>
  <a href="{{ request()->routeIs('home') ? '#kontak' : route('home') . '#kontak' }}">Kontak</a>
  <a href="{{ request()->routeIs('home') ? '#kontak' : route('home') . '#kontak' }}" style="margin-top: 12px; text-align: center; background: var(--accent2); color: white; padding: 10px; border-radius: 6px; font-weight: 700; text-decoration: none; font-family: 'Space Grotesk', sans-serif;">Daftar Sekarang</a>
</div>

@yield('content')


<!-- ===== FOOTER ===== -->
<footer role="contentinfo">
  <div class="container">
    <div class="footer-inner">

      {{-- ── BRAND COLUMN ── --}}
      <div class="footer-brand">
        <div class="footer-logo-row">
          <div class="footer-logo-badge" @if(isset($site_logo) && !empty($site_logo)) style="background: transparent; padding: 0; width: auto; height: 44px; border-radius: 0;" @endif>
            @if(isset($site_logo) && !empty($site_logo))
              <img src="{{ asset($site_logo) }}" alt="Logo {{ $site_name ?? 'TJKT' }}" style="height: 44px; max-width: 100px; object-fit: contain;">
            @else
              TJ
            @endif
          </div>
          <div>
            <div class="footer-brand-name">{{ $site_name ?? 'TJKT SMK Fadris' }}</div>
            <div class="footer-brand-sub">Teknik Jaringan &amp; Komputer</div>
          </div>
        </div>
        <p class="footer-brand-desc">Mencetak lulusan terampil, berdaya saing tinggi, dan siap kerja di bidang teknologi jaringan &amp; telekomunikasi.</p>
        <div class="footer-social">
          <a href="#" aria-label="Instagram" target="_blank" rel="noopener"><i class="fab fa-instagram"></i></a>
          <a href="#" aria-label="YouTube" target="_blank" rel="noopener"><i class="fab fa-youtube"></i></a>
          <a href="#" aria-label="Facebook" target="_blank" rel="noopener"><i class="fab fa-facebook-f"></i></a>
          <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $site_kontak->whatsapp ?? '') }}" aria-label="WhatsApp" target="_blank" rel="noopener"><i class="fab fa-whatsapp"></i></a>
        </div>
      </div>

      {{-- ── NAVIGASI COLUMN ── --}}
      <div class="footer-col">
        <div class="footer-col-title">Navigasi</div>
        <div class="footer-links">
          <a href="{{ route('home') }}">Home</a>
          <a href="{{ route('home') }}#profil">Profil</a>
          <a href="{{ route('home') }}#kurikulum">Kurikulum</a>
          <a href="{{ route('home') }}#eservice">E-Service</a>
          <a href="{{ route('home') }}#galeri">Galeri</a>
          <a href="{{ route('home') }}#keunggulan">Keunggulan</a>
          <a href="{{ route('blog.index') }}">Berita</a>
          <a href="{{ route('download.index') }}">Download</a>
          <a href="{{ route('home') }}#kontak">Kontak</a>
        </div>
      </div>

      {{-- ── LAYANAN COLUMN ── --}}
      <div class="footer-col">
        <div class="footer-col-title">Layanan</div>
        <div class="footer-links">
          <a href="{{ route('home') }}#kurikulum">Modul Belajar</a>
          <a href="{{ route('home') }}#eservice">Portal Akademik</a>
          <a href="{{ route('home') }}#eservice">E-Learning</a>
          <a href="{{ route('home') }}#galeri">Galeri Kegiatan</a>
          <a href="{{ route('home') }}#kontak">Daftar Sekarang</a>
        </div>
      </div>

      {{-- ── KONTAK COLUMN ── --}}
      <div class="footer-col">
        <div class="footer-col-title">Kontak</div>
        <div class="footer-links">
          @if(isset($site_kontak))
            @if(!empty($site_kontak->email))
            <a href="mailto:{{ $site_kontak->email }}" class="footer-contact-item">
              <i class="fas fa-envelope"></i>
              <span>{{ $site_kontak->email }}</span>
            </a>
            @endif
            @if(!empty($site_kontak->whatsapp))
            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $site_kontak->whatsapp) }}" class="footer-contact-item" target="_blank" rel="noopener">
              <i class="fab fa-whatsapp"></i>
              <span>{{ $site_kontak->whatsapp }}</span>
            </a>
            @endif
            @if(!empty($site_kontak->alamat))
            <span class="footer-contact-item">
              <i class="fas fa-map-marker-alt"></i>
              <span>{{ $site_kontak->alamat }}</span>
            </span>
            @endif
          @endif
        </div>
      </div>

    </div>{{-- /.footer-inner --}}

    <div class="footer-copy">
      <span>© {{ date('Y') }} {{ $site_name ?? 'TJKT SMK Fadris' }}. All rights reserved.</span>
    </div>
  </div>
</footer>


<!-- ===== LIGHTBOX MODAL ===== -->
<div id="lightboxModal" class="lightbox-modal" aria-hidden="true" role="dialog">
  <button class="lightbox-close" id="lightboxClose" aria-label="Tutup Galeri">&times;</button>
  <div class="lightbox-content">
    <img id="lightboxImage" src="" alt="Gallery Preview">
    <div id="lightboxCaption" class="lightbox-caption"></div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
@stack('scripts')
</body>
</html>
