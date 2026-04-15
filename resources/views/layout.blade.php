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
  
  <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
  
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
  <a href="{{ route('home') }}" class="navbar-brand" aria-label="{{ $site_name ?? 'Home' }}">
    <div class="navbar-logo">
      @if(isset($site_logo))
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
    <li><a href="{{ route('home') }}">Home</a></li>
    @if(request()->routeIs('home'))
        <li><a href="#profil">Profil</a></li>
        <li><a href="#kurikulum">Kurikulum</a></li>
        <li><a href="#galeri">Galeri</a></li>
    @endif
    <li><a href="{{ route('blog.index') }}">Berita</a></li>
    <li><a href="{{ route('home') }}#kontak">Kontak</a></li>
  </ul>
  <button class="navbar-toggle" id="navbarToggle" aria-label="Toggle navigation" aria-expanded="false">
    <span></span><span></span><span></span>
  </button>
</nav>

<!-- Mobile Menu -->
<div class="mobile-menu" id="mobileMenu" role="navigation" aria-label="Mobile Navigation">
  <a href="{{ route('home') }}">Home</a>
  @if(request()->routeIs('home'))
      <a href="#profil">Profil</a>
      <a href="#kurikulum">Kurikulum</a>
      <a href="#galeri">Galeri</a>
  @endif
  <a href="{{ route('blog.index') }}">Berita</a>
  <a href="{{ route('home') }}#kontak">Kontak</a>
</div>

@yield('content')

<!-- ===== FOOTER ===== -->
<footer role="contentinfo">
  <div class="footer-content">
    <div class="footer-brand">
      <div class="footer-logo">TJ</div>
      <strong>{{ $site_name ?? 'TJKT' }}</strong>
    </div>
    <p>© {{ date('Y') }} {{ $site_name ?? 'TJKT' }}. Teknik Jaringan Komputer dan Telekomunikasi.</p>
    <p style="margin-top:0.5rem">
      <a href="{{ route('admin.login') }}" style="color: var(--text-secondary); font-size:0.8rem; text-decoration:none; opacity:0.6">
        Admin Panel
      </a>
    </p>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
@stack('scripts')
</body>
</html>
