@extends('layout')

@section('title', $site_name)

@section('content')
<!-- ===== HERO SECTION ===== -->
<section id="hero" aria-label="Hero Section">
  <video autoplay loop muted playsinline class="hero-video-bg">
    <source src="{{ asset('storage/global_network_background_animation.mp4') }}" type="video/mp4">
  </video>
  <div class="hero-bg-circles" aria-hidden="true">
    <div class="hero-circle"></div>
    <div class="hero-circle"></div>
    <div class="hero-circle"></div>
  </div>
  
  <div class="hero-inner animate-on-scroll">
    <div class="hero-content">
      <div class="hero-badge">
        <div class="hero-badge-dot"></div>
        <span>Jurusan Teknologi Unggulan 2025</span>
      </div>
      @php
        $title_parts = explode("\n", $hero_title);
      @endphp
      <h1 class="hero-title display">
        {{ $title_parts[0] ?? '' }}
        @if(isset($title_parts[1]))
          <br><span class="accent-line">{{ $title_parts[1] }}</span>
        @endif
      </h1>
      <p class="hero-desc">
        {{ $hero_subtitle }}
      </p>
      <div class="hero-actions">
        <a href="#kurikulum" class="btn-primary" id="btn-daftar">
          Lihat Kurikulum
          <svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="2" style="width:16px;height:16px;"><path d="M3 8h10M9 4l4 4-4 4"/></svg>
        </a>
        <a href="#profil" class="btn-outline" id="btn-pelajari">Pelajari Lebih Lanjut</a>
      </div>
      
      <div class="hero-stats">
        <div class="stat-item">
          <div class="stat-num">10<span>+</span></div>
          <div class="stat-label">Mata Pelajaran Unggulan</div>
        </div>
        <div class="stat-item">
          <div class="stat-num">100<span>%</span></div>
          <div class="stat-label">Lulusan Siap Kerja</div>
        </div>
        <div class="stat-item">
          <div class="stat-num">5<span>+</span></div>
          <div class="stat-label">Mitra Industri</div>
        </div>
      </div>
    </div>
  </div>

  <div class="scroll-indicator" aria-hidden="true">
    <i class="fas fa-chevron-down"></i>
  </div>
</section>

<!-- ===== TENTANG JURUSAN ===== -->
<section id="profil" class="about">
  <div class="container">
    <div class="about-inner animate-on-scroll">
    <div>
      <p class="section-eyebrow">Tentang Jurusan</p>
      <h2 class="section-title display">Siap Terjun ke Industri Teknologi</h2>
      <p class="section-sub">{!! nl2br(e($profil_text)) !!}</p>
      <div class="badge-row" style="margin-top:28px">
        <span class="badge">Cisco Networking</span>
        <span class="badge">Linux Server</span>
        <span class="badge">Cloud Computing</span>
        <span class="badge">Cybersecurity</span>
        <span class="badge">Fiber Optik</span>
        <span class="badge">IoT</span>
      </div>
    </div>
    <div class="about-visual animate-on-scroll">
      <div class="about-card">
        <div class="about-card-header">
          <div class="about-icon">
            <svg viewBox="0 0 24 24"><rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8M12 17v4"/></svg>
          </div>
          <div>
            <h3>Laboratorium Modern</h3>
          </div>
        </div>
        <p>Fasilitas lab jaringan lengkap dengan perangkat Cisco, MikroTik, dan server dedicated untuk praktik langsung siswa setiap hari.</p>
        <div style="margin-top:20px;height:4px;background:#F4F7FC;border-radius:2px;overflow:hidden">
          <div style="height:100%;width:85%;background:linear-gradient(90deg,#00C8FF,#0F2447);border-radius:2px"></div>
        </div>
        <div style="display:flex;justify-content:space-between;margin-top:6px">
          <span style="font-size:12px;color:var(--text-secondary)">Utilisasi Lab</span>
          <span style="font-size:12px;font-weight:600;color:var(--primary)">85%</span>
        </div>
      </div>
      <div class="floating-stat">
        <div class="num">98%</div>
        <div class="lbl">Tingkat kepuasan siswa</div>
      </div>
    </div>
    </div>
  </div>
</section>

<div class="section-divider"></div>

<!-- ===== KABAR TERBARU SECTION ===== -->
@if(isset($latest_posts) && $latest_posts->isNotEmpty())
<section id="berita" class="latest-posts-section">
  <div class="container">
    <div class="kurikulum-header animate-on-scroll">
      <p class="section-eyebrow">Berita & Informasi</p>
      <h2 class="section-title display">📝 Kabar Terbaru</h2>
      <p class="section-sub" style="margin: 0 auto;">Ikuti informasi terhangat seputar kegiatan dan perkembangan jurusan.</p>
    </div>
    
    <div class="latest-posts-grid">
      @foreach($latest_posts as $post)
      <a href="{{ route('blog.show', $post->slug) }}" class="post-card animate-on-scroll" style="animation-delay: {{ $loop->index * 0.1 }}s">
        @if($post->featured_image)
          <img src="{{ asset($post->featured_image) }}" alt="{{ $post->title }}" class="post-card-img">
        @elseif($post->images && $post->images->isNotEmpty())
          <img src="{{ asset($post->images->first()->image_path) }}" alt="{{ $post->title }}" class="post-card-img">
        @else
          <div class="post-card-img-placeholder">📄</div>
        @endif

        <div class="post-card-body">
          <div class="post-card-meta">
            <span class="post-card-cat">{{ $post->category->name ?? 'Umum' }}</span>
            <span class="post-card-date">{{ $post->created_at->translatedFormat('d M Y') }}</span>
          </div>
          <div class="post-card-title">{{ $post->title }}</div>
          <p class="post-card-excerpt">{{ Str::limit($post->excerpt, 100) }}</p>
          <div class="post-card-footer">
            <div class="post-card-author">
              <div class="author-avatar">{{ strtoupper(substr($post->author->nama ?? 'A', 0, 1)) }}</div>
              <span>{{ $post->author->nama ?? 'Admin' }}</span>
            </div>
            <span class="post-card-read">Baca <i class="fas fa-arrow-right" style="font-size:10px;"></i></span>
          </div>
        </div>
      </a>
      @endforeach
    </div>
    
    <div style="text-align: center; margin-top: 40px;" class="animate-on-scroll">
      <a href="{{ route('blog.index') }}" class="cta-btn-sec" style="color: var(--primary); border-color: rgba(15,36,71,0.15);">
        Lihat Semua Berita <i class="fas fa-arrow-right" style="margin-left:6px; font-size:12px;"></i>
      </a>
    </div>
  </div>
</section>
@endif

<div class="section-divider"></div>

<!-- ===== KURIKULUM SECTION ===== -->
<section id="kurikulum" class="kurikulum">
  <div class="container">
    <div class="kurikulum-header animate-on-scroll">
      <p class="section-eyebrow">Program Pembelajaran</p>
      <h2 class="section-title display">📚 Kurikulum & Modul Belajar</h2>
      <p class="section-sub" style="margin: 0 auto;">Mata pelajaran kejuruan TJKT yang dirancang selaras dengan kebutuhan industri teknologi modern.</p>
    </div>
    
    <div class="kurikulum-filter animate-on-scroll">
      <button class="filter-btn active" data-filter="all">Semua</button>
      <button class="filter-btn" data-filter="X">Kelas X</button>
      <button class="filter-btn" data-filter="XI">Kelas XI</button>
      <button class="filter-btn" data-filter="XII">Kelas XII</button>
    </div>

    <div class="subjects-grid">
      @foreach($kurikulum as $i => $mapel)
      @php
        $colors = ['blue', 'orange', 'purple'];
        $color = $colors[$i % 3];
        $kelas = $mapel->kelas ?: 'X';
      @endphp
      <div class="subject-card animate-on-scroll" data-kelas="{{ $kelas }}" style="animation-delay: {{ $i * 0.05 }}s">
        <div class="subject-icon {{ $color }}">
          @if($color === 'blue')
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
          @elseif($color === 'orange')
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2" /><path d="M8 21h8M12 17v4"/></svg>
          @else
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 8v8M8 12h8"/></svg>
          @endif
        </div>
        <h4>{{ $mapel->nama_mapel }}</h4>
        <p>{{ $mapel->deskripsi ?: 'Pelajari konsep dasar, konfigurasi praktis, dan troubleshooting mendalam terkait ' . strtolower($mapel->nama_mapel) . '.' }}</p>
        @if($mapel->kelas)
        <span class="subject-tag tag-{{ $color }}">Kelas {{ $mapel->kelas }}</span>
        @else
        <span class="subject-tag tag-{{ $color }}">Kelas X</span>
        @endif
        
        <div style="display:flex; gap:10px; margin-top:20px;">
          <a href="{{ $mapel->modul_url }}" class="cta-btn-main" style="padding: 8px 14px; font-size: 13px; text-align: center; flex: 1; border-radius: 6px;" target="_blank" rel="noopener">
            <i class="fas fa-download" style="margin-right: 4px;"></i> Modul
          </a>
          <a href="{{ $mapel->roadmap_url }}" class="cta-btn-sec" style="padding: 8px 14px; font-size: 13px; text-align: center; flex: 1; border-radius: 6px; border-color: rgba(15,36,71,0.15); color: var(--primary);" target="_blank" rel="noopener">
            <i class="fas fa-map" style="margin-right: 4px;"></i> Roadmap
          </a>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

<div class="section-divider"></div>

<!-- ===== LAYANAN SECTION ===== -->
<section id="eservice" class="layanan">
  <div class="container">
    <div class="layanan-header animate-on-scroll">
      <p class="section-eyebrow">Portal Digital</p>
      <h2 class="section-title display">Layanan E-Service</h2>
      <p class="section-sub">Akses berbagai aplikasi internal dan sistem informasi TJKT SMK Fadris dalam satu pintu — cepat, mudah, dan terintegrasi.</p>
    </div>

    @php
      $iconColors = ['icon-blue','icon-purple','icon-green','icon-rose','icon-amber','icon-teal'];
      $icons = ['🖥️','👨‍👩‍👧','📚','📊','🔧','🌐'];
    @endphp

    <div class="services-grid">
      @foreach($eservice as $i => $svc)
      @php
        $colorClass = $iconColors[$i % count($iconColors)];
        $icon = $icons[$i % count($icons)];
      @endphp
      <a href="{{ $svc->url }}" class="service-item animate-on-scroll" style="animation-delay:{{ $i * 0.07 }}s" target="_blank" rel="noopener">
        <div class="service-icon-wrap {{ $colorClass }}">{{ $icon }}</div>
        <div class="service-body">
          <h4>{{ $svc->nama }}</h4>
          <p>{{ $svc->deskripsi }}</p>
          <div class="service-link-row">
            Buka Layanan <i class="fas fa-arrow-right" style="font-size:10px;"></i>
          </div>
        </div>
      </a>
      @endforeach
    </div>
  </div>
</section>


<div class="section-divider"></div>

<!-- ===== GALERI SECTION ===== -->
<section id="galeri" class="galeri">
  <div class="container">
    <div class="galeri-header animate-on-scroll">
      <div>
        <p class="section-eyebrow">Aktivitas Kami</p>
        <h2 class="section-title display">📸 Galeri Kegiatan</h2>
      </div>
      <a href="https://www.instagram.com/{{ $ig_username }}/" class="galeri-link" target="_blank" rel="noopener">
        <span>@</span>{{ $ig_username }} <svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="2" style="width:16px;height:16px;"><path d="M5 12l5-5-5-5"/></svg>
      </a>
    </div>

    <div class="galeri-grid">
      @if($galeri->isNotEmpty())
        @foreach($galeri as $i => $foto)
        <a href="javascript:void(0)" class="galeri-item {{ $i === 0 ? 'tall' : '' }} animate-on-scroll galeri-lightbox-trigger" data-image="{{ $foto->foto_url }}" data-title="{{ $foto->judul ?? 'Galeri TJKT' }}">
          <img src="{{ $foto->foto_url }}" alt="{{ $foto->judul ?? 'Galeri TJKT' }}" style="width:100%; height:100%; object-fit:cover;" />
          <div class="galeri-overlay">
            <div class="galeri-overlay-content">
              <i class="fas fa-search-plus"></i>
              <span>Lihat Foto</span>
            </div>
          </div>
        </a>
        @endforeach
      @else
        <!-- Fallback placeholders to match mockup exactly -->
        <div class="galeri-item tall g1 animate-on-scroll">
          <div class="galeri-placeholder">
            <span class="galeri-icon">💻</span>
            <span class="galeri-label">Praktikum Jaringan</span>
          </div>
        </div>
        <div class="galeri-item g2 animate-on-scroll">
          <div class="galeri-placeholder">
            <span class="galeri-icon">⚡</span>
            <span class="galeri-label">Instalasi Fiber Optik</span>
          </div>
        </div>
        <div class="galeri-item g3 animate-on-scroll">
          <div class="galeri-placeholder">
            <span class="galeri-icon">🛡️</span>
            <span class="galeri-label">Uji Cybersecurity</span>
          </div>
        </div>
        <div class="galeri-item g4 animate-on-scroll">
          <div class="galeri-placeholder">
            <span class="galeri-icon">🚀</span>
            <span class="galeri-label">Project IoT</span>
          </div>
        </div>
        <div class="galeri-item g5 animate-on-scroll">
          <div class="galeri-placeholder">
            <span class="galeri-icon">🎓</span>
            <span class="galeri-label">Uji Sertifikasi</span>
          </div>
        </div>
      @endif
    </div>
  </div>
</section>

<div class="section-divider"></div>

<!-- ===== KEUNGGULAN SECTION ===== -->
<section id="keunggulan" class="keunggulan">
  <div class="container">
    <div class="keunggulan-inner">
    <div>
      <p class="section-eyebrow">Mengapa Kami</p>
      <h2 class="section-title display">🌟 Keunggulan TJKT SMK Fadris</h2>
      <p class="section-sub">Komitmen penuh kami dalam menyelenggarakan pendidikan vokasi berkualitas unggul, berorientasi industri, dan berdaya saing global.</p>
      
      <div class="keunggulan-list">
        @foreach($keunggulan as $k)
        <div class="keunggulan-item animate-on-scroll">
          <div class="k-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
          </div>
          <div class="k-body">
            <h4>{{ $k->judul }}</h4>
            <p>{{ $k->deskripsi }}</p>
          </div>
        </div>
        @endforeach
      </div>
    </div>
    
    <div class="keunggulan-visual animate-on-scroll">
      <div class="kv-grid"></div>
      <div class="kv-content">
        <div class="kv-title">Pencapaian Mutu Lulusan</div>
        <div class="kv-stats">
          <div class="kv-stat">
            <div class="n">92<em>%</em></div>
            <div class="l">Penyerapan Kerja Lulusan</div>
          </div>
          <div class="kv-stat">
            <div class="n">100<em>%</em></div>
            <div class="l">Kelulusan Sertifikasi Mikrotik & Cisco</div>
          </div>
        </div>
        
        <div class="kv-bar">
          <div class="kv-bar-label">
            <span>Kesiapan Kerja Lulusan</span>
            <span>95%</span>
          </div>
          <div class="kv-bar-track">
            <div class="kv-bar-fill" style="width: 95%"></div>
          </div>
        </div>
        
        <div class="kv-bar" style="margin-top:20px">
          <div class="kv-bar-label">
            <span>Kepuasan Mitra Industri (DUDI)</span>
            <span>98%</span>
          </div>
          <div class="kv-bar-track">
            <div class="kv-bar-fill" style="width: 98%; background: var(--accent2);"></div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </div>
</section>

<div class="section-divider"></div>

<!-- ===== KONTAK SECTION ===== -->
<section id="kontak" class="kontak">
  <div class="container">
    <div class="kontak-inner">
    <div class="kontak-info animate-on-scroll">
      <p class="section-eyebrow">Hubungi Kami</p>
      <h2 class="section-title display">📞 Mari Terhubung</h2>
      <p class="section-sub" style="margin-bottom:32px">Punya pertanyaan seputar kurikulum, kerja sama industri, atau pendaftaran siswa baru? Tim kami siap melayani Anda.</p>
      
      <div style="display:flex; flex-direction:column; gap:20px">
        @if($kontak && !empty($kontak->email))
        <div class="kontak-item">
          <div class="kontak-ico">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
          </div>
          <div>
            <small>Kirim Email</small>
            <span>{{ $kontak->email }}</span>
          </div>
        </div>
        @endif
        
        @if($kontak && !empty($kontak->whatsapp))
        <div class="kontak-item">
          <div class="kontak-ico">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
          </div>
          <div>
            <small>Layanan WhatsApp</small>
            <span>{{ $kontak->whatsapp }}</span>
          </div>
        </div>
        @endif
        
        @if($kontak && !empty($kontak->alamat))
        <div class="kontak-item">
          <div class="kontak-ico">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
          </div>
          <div>
            <small>Alamat Sekolah</small>
            <span>{{ $kontak->alamat }}</span>
          </div>
        </div>
        @endif
      </div>
    </div>
    
    <div class="cta-box animate-on-scroll">
      <div class="cta-glow"></div>
      <h3>Tertarik Bergabung Bersama Kami?</h3>
      <p>Persiapkan karier masa depan cerlang di bidang IT & Networking bersama ribuan lulusan sukses TJKT SMK Fadris.</p>
      <div class="cta-btns">
        @if($kontak)
        <a href="https://wa.me/{{ $kontak->whatsapp_formatted }}" class="cta-btn-main btn-whatsapp" target="_blank" rel="noopener">
          <i class="fab fa-whatsapp" style="margin-right:6px"></i> Hubungi WhatsApp
        </a>
        <a href="{{ $kontak->website_formatted }}" class="cta-btn-sec" target="_blank" rel="noopener">
          <i class="fas fa-globe" style="margin-right:6px"></i> Kunjungi Website
        </a>
        @endif
      </div>
    </div>
    </div>
  </div>
</section>
@endsection


@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
  const filterBtns = document.querySelectorAll('.filter-btn');
  const cards = document.querySelectorAll('.subject-card');

  filterBtns.forEach(btn => {
    btn.addEventListener('click', function() {
      // Remove active class from all
      filterBtns.forEach(b => b.classList.remove('active'));
      // Add active to current
      this.classList.add('active');

      const filterValue = this.getAttribute('data-filter');

      cards.forEach(card => {
        if (filterValue === 'all' || card.getAttribute('data-kelas') === filterValue) {
          card.style.display = 'block';
          // simple reflow trick for animation trigger
          card.style.animation = 'none';
          card.offsetHeight; 
          card.style.animation = null;
        } else {
          card.style.display = 'none';
        }
      });
    });
  });
});
</script>
@endpush