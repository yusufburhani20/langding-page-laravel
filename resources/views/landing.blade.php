@extends('layout')

@section('title', $site_name)

@section('content')
<!-- ===== HERO SECTION ===== -->
<section id="hero" aria-label="Hero Section">
  <div class="hero-bg-circles" aria-hidden="true">
    <div class="hero-circle"></div>
    <div class="hero-circle"></div>
    <div class="hero-circle"></div>
  </div>
  <div class="hero-content">
    <div class="hero-badge">
      <i class="fas fa-graduation-cap"></i>
      Jurusan Teknologi Unggulan 2025
    </div>
    <h1 class="hero-title">
      🎓 {!! nl2br(e($hero_title)) !!}
    </h1>
    <p class="hero-subtitle">
      📢 {{ $hero_subtitle }}
    </p>
    <div class="hero-actions">
      <a href="#kurikulum" class="btn btn-primary" id="btn-daftar">
        <i class="fas fa-rocket"></i> Lihat Kurikulum
      </a>
      <a href="#profil" class="btn btn-outline" id="btn-pelajari">
        <i class="fas fa-info-circle"></i> Pelajari Lebih Lanjut
      </a>
    </div>
  </div>
  <div class="scroll-indicator" aria-hidden="true">
    <i class="fas fa-chevron-down"></i>
  </div>
</section>

<div class="section-divider"></div>

<!-- ===== PROFIL SECTION ===== -->
<section id="profil" aria-labelledby="profil-heading">
  <div class="container">
    <div class="section-header animate-on-scroll">
      <div class="section-label"><i class="fas fa-school"></i> Tentang Kami</div>
      <h2 class="section-title" id="profil-heading">👨🏫 Profil TJKT SMK Fadris</h2>
    </div>

    <div class="profil-card animate-on-scroll">
      <div class="profil-icon-wrap" aria-hidden="true">🏫</div>
      <div class="profil-text">
        <h3>Jurusan Teknik Jaringan Komputer dan Telekomunikasi</h3>
        <p>{!! nl2br(e($profil_text)) !!}</p>
      </div>
    </div>

    <div class="profil-stats">
      <div class="stat-card animate-on-scroll">
        <div class="stat-number">10+</div>
        <div class="stat-label">Mata Pelajaran Unggulan</div>
      </div>
      <div class="stat-card animate-on-scroll">
        <div class="stat-number">100%</div>
        <div class="stat-label">Lulusan Siap Kerja</div>
      </div>
      <div class="stat-card animate-on-scroll">
        <div class="stat-number">5+</div>
        <div class="stat-label">Mitra Industri</div>
      </div>
    </div>
  </div>
</section>

<div class="section-divider"></div>

<!-- ===== KURIKULUM SECTION ===== -->
<section id="kurikulum" aria-labelledby="kurikulum-heading">
  <div class="container">
    <div class="section-header animate-on-scroll">
      <div class="section-label"><i class="fas fa-book-open"></i> Pembelajaran</div>
      <h2 class="section-title" id="kurikulum-heading">📚 Kurikulum</h2>
      <p class="section-desc">Mata pelajaran yang dirancang untuk membekali siswa dengan keterampilan industri terkini.</p>
    </div>
    <div class="kurikulum-grid">
      @foreach($kurikulum as $i => $mapel)
      <div class="kurikulum-item animate-on-scroll" style="animation-delay: {{ $i * 0.05 }}s">
        <div class="kurikulum-number">{{ $i + 1 }}</div>
        <div class="kurikulum-name">{{ $mapel->nama_mapel }}</div>
        <div class="kurikulum-actions">
          <a href="{{ $mapel->modul_url }}"
             class="btn btn-secondary btn-sm"
             id="modul-{{ $mapel->id }}"
             target="_blank" rel="noopener"
             aria-label="Download Modul {{ $mapel->nama_mapel }}">
            <i class="fas fa-download"></i> Download Modul
          </a>
          <a href="{{ $mapel->roadmap_url }}"
             class="btn btn-ghost btn-sm"
             id="roadmap-{{ $mapel->id }}"
             target="_blank" rel="noopener"
             aria-label="Lihat Roadmap {{ $mapel->nama_mapel }}">
            <i class="fas fa-map"></i> Lihat Roadmap
          </a>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

<div class="section-divider"></div>

<!-- ===== GALERI SECTION ===== -->
<section id="galeri" aria-labelledby="galeri-heading">
  <div class="container">
    <div class="section-header animate-on-scroll">
      <div class="section-label"><i class="fab fa-instagram"></i> Instagram</div>
      <h2 class="section-title" id="galeri-heading">📝 Galeri Foto</h2>
      <p class="section-desc">Postingan terbaru dari Instagram <strong>@{{ $ig_username }}</strong></p>
    </div>

    @if($galeri->isNotEmpty())
    <div class="galeri-grid">
      @foreach($galeri as $foto)
      <a href="{{ $foto->instagram_url }}"
         class="galeri-item animate-on-scroll"
         target="_blank" rel="noopener"
         aria-label="{{ $foto->judul ?? 'Foto Galeri' }}">
        <img src="{{ $foto->foto_url }}"
             alt="{{ $foto->judul ?? 'Galeri TJKT' }}"
             loading="lazy" />
        <div class="galeri-overlay">
          <div class="galeri-overlay-content">
            <i class="fab fa-instagram"></i>
            <span>Lihat di Instagram</span>
          </div>
        </div>
      </a>
      @endforeach
    </div>
    @else
    <div class="instagram-placeholder animate-on-scroll">
      <i class="fab fa-instagram"></i>
      <h3>@{{ $ig_username }}</h3>
      <p>Ikuti kami di Instagram untuk melihat kegiatan dan aktivitas terbaru TJKT SMK Fadris.</p>
      <a href="https://www.instagram.com/{{ $ig_username }}/"
         target="_blank" rel="noopener"
         class="btn btn-primary"
         id="btn-instagram">
        <i class="fab fa-instagram"></i> Ikuti di Instagram
      </a>
    </div>
    @endif
  </div>
</section>

<div class="section-divider"></div>

<!-- ===== E-SERVICE SECTION ===== -->
<section id="eservice" aria-labelledby="eservice-heading">
  <div class="container">
    <div class="section-header animate-on-scroll">
      <div class="section-label"><i class="fas fa-laptop-code"></i> Digital</div>
      <h2 class="section-title" id="eservice-heading">📅 Layanan E-Service</h2>
      <p class="section-desc">Akses layanan digital sekolah secara mudah dan cepat dari mana saja.</p>
    </div>
    <div class="eservice-grid">
      @foreach($eservice as $svc)
      <a href="{{ $svc->url }}"
         class="eservice-card animate-on-scroll"
         target="_blank" rel="noopener"
         id="eservice-{{ $svc->id }}"
         aria-label="{{ $svc->nama }}">
        <div class="eservice-icon" style="background: {{ $svc->warna }}">
          <i class="{{ $svc->icon }}"></i>
        </div>
        <div>
          <h3>{{ $svc->nama }}</h3>
          <p>{{ $svc->deskripsi }}</p>
          <div class="eservice-url">{{ parse_url($svc->url, PHP_URL_HOST) ?: $svc->url }}</div>
        </div>
        <span class="btn btn-secondary btn-sm" style="pointer-events:none">
          <i class="fas fa-external-link-alt"></i> Buka Layanan
        </span>
      </a>
      @endforeach
    </div>
  </div>
</section>

<div class="section-divider"></div>

<!-- ===== KEUNGGULAN SECTION ===== -->
<section id="keunggulan" aria-labelledby="keunggulan-heading">
  <div class="container">
    <div class="section-header animate-on-scroll">
      <div class="section-label"><i class="fas fa-star"></i> Keunggulan</div>
      <h2 class="section-title" id="keunggulan-heading">🌟 Kenapa Memilih TJKT SMK Fadris?</h2>
      <p class="section-desc">Kami berkomitmen untuk memberikan pendidikan vokasi terbaik yang menghasilkan lulusan berkualitas.</p>
    </div>
    <div class="keunggulan-grid">
      @foreach($keunggulan as $k)
      <div class="keunggulan-card animate-on-scroll">
        <div class="keunggulan-icon" aria-hidden="true">
          <i class="{{ $k->icon }}"></i>
        </div>
        <h3>{{ $k->judul }}</h3>
        <p>{{ $k->deskripsi }}</p>
      </div>
      @endforeach
    </div>
  </div>
</section>

<div class="section-divider"></div>

<!-- ===== KONTAK SECTION ===== -->
<section id="kontak" aria-labelledby="kontak-heading">
  <div class="container">
    <div class="section-header animate-on-scroll">
      <div class="section-label"><i class="fas fa-headset"></i> Hubungi</div>
      <h2 class="section-title" id="kontak-heading">📞 Hubungi Kami</h2>
    </div>
    <div class="kontak-wrapper">
      <div class="kontak-info animate-on-scroll">
        <h2>Mari Terhubung Bersama Kami</h2>
        <p>Jangan ragu untuk menghubungi kami jika ada pertanyaan seputar jurusan TJKT SMK Fadris.</p>
        <div class="kontak-items">
          @if($kontak && !empty($kontak->email))
          <a href="mailto:{{ $kontak->email }}" class="kontak-item" id="kontak-email">
            <div class="kontak-icon"><i class="fas fa-envelope"></i></div>
            <span>📧 {{ $kontak->email }}</span>
          </a>
          @endif
          @if($kontak && !empty($kontak->whatsapp))
          <a href="https://wa.me/{{ $kontak->whatsapp_formatted }}"
             class="kontak-item" id="kontak-wa" target="_blank" rel="noopener">
            <div class="kontak-icon" style="background: linear-gradient(135deg, #25d366, #128c7e)">
              <i class="fab fa-whatsapp"></i>
            </div>
            <span>📱 {{ $kontak->whatsapp }}</span>
          </a>
          @endif
          @if($kontak && !empty($kontak->website))
          <a href="{{ $kontak->website_formatted }}"
             class="kontak-item" id="kontak-web" target="_blank" rel="noopener">
            <div class="kontak-icon"><i class="fas fa-globe"></i></div>
            <span>🌐 {{ $kontak->website }}</span>
          </a>
          @endif
          @if($kontak && !empty($kontak->alamat))
          <div class="kontak-item">
            <div class="kontak-icon"><i class="fas fa-map-marker-alt"></i></div>
            <span>📍 {{ $kontak->alamat }}</span>
          </div>
          @endif
        </div>
      </div>

      <div class="kontak-cta animate-on-scroll">
        <div class="kontak-cta-icon" aria-hidden="true">🚀</div>
        <h3>Daftar Sekarang!</h3>
        <p>Jadilah bagian dari keluarga besar TJKT SMK Fadris dan raih masa depan cerah di dunia teknologi.</p>
        @if($kontak)
        <a href="https://wa.me/{{ $kontak->whatsapp_formatted }}"
           class="btn btn-primary" id="btn-daftar-kontak"
           target="_blank" rel="noopener">
          <i class="fab fa-whatsapp"></i> Hubungi via WhatsApp
        </a>
        <a href="{{ $kontak->website_formatted }}"
           class="btn btn-ghost" id="btn-web-kontak"
           target="_blank" rel="noopener">
          <i class="fas fa-globe"></i> Kunjungi Website Resmi
        </a>
        @endif
      </div>
    </div>
  </div>
</section>
@endsection
