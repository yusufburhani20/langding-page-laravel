@extends('layout')

@section('title', $title)

@push('styles')
<style>
/* ── Blog Hero ── */
.blog-hero {
  background: linear-gradient(135deg, var(--primary-dark, #0A1C36) 0%, #1e40af 50%, var(--primary, #0F2447) 100%);
  padding: 160px 5% 80px;
  text-align: center;
  position: relative;
  overflow: hidden;
  margin-top: 0;
}
.blog-hero-badge {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  background: rgba(255, 255, 255, 0.1);
  border: 1px solid rgba(255, 255, 255, 0.2);
  border-radius: 99px;
  padding: 6px 18px;
  font-size: 12px;
  font-weight: 700;
  letter-spacing: 0.06em;
  text-transform: uppercase;
  color: #38BDF8;
  margin-bottom: 20px;
}
.blog-hero h1 {
  font-family: 'Space Grotesk', sans-serif;
  font-size: 48px;
  font-weight: 800;
  color: #ffffff;
  line-height: 1.1;
  margin-bottom: 16px;
}
.blog-hero p {
  font-size: 16px;
  color: rgba(255, 255, 255, 0.75);
  max-width: 520px;
  margin: 0 auto;
  line-height: 1.7;
}

/* ── Cat Pills ── */
.cat-filter-row {
  display: flex;
  flex-wrap: wrap;
  gap: 10px;
  margin-bottom: 48px;
}
.cat-pill {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  padding: 8px 18px;
  border-radius: 99px;
  font-size: 13px;
  font-weight: 700;
  text-decoration: none;
  border: 1px solid rgba(15, 36, 71, 0.08);
  background: #F4F7FC;
  color: var(--text-secondary);
  transition: all 0.2s;
}
.cat-pill:hover {
  color: var(--primary);
  border-color: rgba(14,165,233,0.3);
  background: rgba(14,165,233,0.05);
}
.cat-pill.active {
  background: var(--primary);
  border-color: var(--primary);
  color: #fff;
}

/* ── Post Grid ── */
.blog-main {
  background: #ffffff;
  padding: 64px 5%;
}
.blog-inner {
  display: grid;
  grid-template-columns: 1fr 300px;
  gap: 48px;
  max-width: 1200px;
  margin: 0 auto;
}
.blog-grid {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 24px;
}

/* ── Post Card ── */
.post-card {
  background: #ffffff;
  border: 1px solid rgba(15, 36, 71, 0.08);
  border-radius: 18px;
  overflow: hidden;
  display: flex;
  flex-direction: column;
  text-decoration: none;
  transition: border-color 0.3s, transform 0.3s, box-shadow 0.3s;
  box-shadow: 0 4px 20px rgba(15, 36, 71, 0.02);
}
.post-card:hover {
  border-color: rgba(14,165,233,0.30);
  background: #ffffff;
  transform: translateY(-4px);
  box-shadow: 0 10px 30px rgba(15, 36, 71, 0.06);
}
.post-card-img {
  width: 100%;
  aspect-ratio: 16/9;
  object-fit: cover;
}
.post-card-img-placeholder {
  width: 100%;
  aspect-ratio: 16/9;
  background: #F4F7FC;
  display: flex;
  align-items: center;
  justify-content: center;
  color: rgba(15, 36, 71, 0.15);
  font-size: 48px;
}
.post-card-body {
  padding: 24px;
  flex: 1;
  display: flex;
  flex-direction: column;
}
.post-card-meta {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-bottom: 14px;
}
.post-card-cat {
  font-size: 11px;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.08em;
  color: #0EA5E9;
  background: rgba(14,165,233,0.08);
  padding: 4px 10px;
  border-radius: 4px;
}
.post-card-date {
  font-size: 12px;
  color: var(--text-secondary);
  opacity: 0.85;
}
.post-card-title {
  font-family: 'Space Grotesk', sans-serif;
  font-size: 17px;
  font-weight: 700;
  color: var(--text-primary);
  line-height: 1.35;
  margin-bottom: 10px;
  transition: color 0.2s;
}
.post-card:hover .post-card-title { color: #0EA5E9; }
.post-card-excerpt {
  font-size: 13.5px;
  color: var(--text-secondary);
  line-height: 1.65;
  display: -webkit-box;
  -webkit-line-clamp: 3;
  -webkit-box-orient: vertical;
  overflow: hidden;
  flex: 1;
  margin-bottom: 20px;
}
.post-card-footer {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding-top: 16px;
  border-top: 1px solid rgba(15, 36, 71, 0.05);
}
.post-card-author {
  display: flex;
  align-items: center;
  gap: 8px;
  font-size: 13px;
  font-weight: 600;
  color: var(--text-secondary);
}
.author-avatar {
  width: 28px; height: 28px;
  background: rgba(14,165,233,0.08);
  border-radius: 50%;
  display: flex; align-items: center; justify-content: center;
  font-size: 12px; font-weight: 700; color: #0EA5E9;
}
.post-card-read {
  font-size: 12px;
  font-weight: 700;
  color: #0EA5E9;
  display: flex;
  align-items: center;
  gap: 5px;
  letter-spacing: 0.04em;
}

/* ── Empty State ── */
.blog-empty {
  grid-column: span 2;
  text-align: center;
  padding: 80px 40px;
  background: #F4F7FC;
  border: 2px dashed rgba(15, 36, 71, 0.10);
  border-radius: 20px;
  color: var(--text-secondary);
}
.blog-empty-icon { font-size: 56px; margin-bottom: 20px; }
.blog-empty h3 { font-size: 22px; font-weight: 700; color: var(--text-primary); margin-bottom: 8px; }

/* ── Sidebar ── */
.blog-sidebar {
  position: sticky;
  top: 90px;
}
.sidebar-widget {
  background: #ffffff;
  border: 1px solid rgba(15, 36, 71, 0.08);
  border-radius: 16px;
  padding: 24px;
  margin-bottom: 20px;
  box-shadow: 0 4px 20px rgba(15, 36, 71, 0.02);
}
.sidebar-widget-title {
  font-family: 'Space Grotesk', sans-serif;
  font-size: 13px;
  font-weight: 700;
  letter-spacing: 0.08em;
  text-transform: uppercase;
  color: #0EA5E9;
  margin-bottom: 20px;
}
.sidebar-cat-list {
  list-style: none;
  padding: 0; margin: 0;
  display: flex; flex-direction: column; gap: 8px;
}
.sidebar-cat-list a {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 10px 14px;
  border-radius: 10px;
  background: #F4F7FC;
  border: 1px solid rgba(15, 36, 71, 0.05);
  text-decoration: none;
  color: var(--text-secondary);
  font-size: 13.5px;
  font-weight: 600;
  transition: all 0.2s;
}
.sidebar-cat-list a:hover,
.sidebar-cat-list a.active {
  background: rgba(14,165,233,0.06);
  border-color: rgba(14,165,233,0.30);
  color: #0EA5E9;
}
.sidebar-count {
  font-size: 11px;
  background: rgba(15, 36, 71, 0.05);
  padding: 2px 8px;
  border-radius: 99px;
  color: var(--text-secondary);
}
.sidebar-cta {
  background: linear-gradient(135deg, #0EA5E9 0%, #0369A1 100%);
  border-radius: 14px;
  padding: 24px;
  color: #fff;
}
.sidebar-cta h4 { font-size: 15px; font-weight: 800; margin-bottom: 8px; }
.sidebar-cta p { font-size: 13px; opacity: 0.85; line-height: 1.55; margin-bottom: 16px; }
.sidebar-cta-btn {
  display: block;
  text-align: center;
  background: rgba(255,255,255,0.15);
  border: 1px solid rgba(255,255,255,0.30);
  color: #fff;
  text-decoration: none;
  padding: 10px;
  border-radius: 8px;
  font-weight: 700;
  font-size: 13px;
  transition: background 0.2s;
}
.sidebar-cta-btn:hover { background: rgba(255,255,255,0.25); }

/* ── Pagination ── */
.blog-pagination {
  margin-top: 40px;
  display: flex;
  justify-content: center;
}

/* ── Responsive ── */
@media (max-width: 900px) {
  .blog-inner { grid-template-columns: 1fr; }
  .blog-sidebar { position: static; }
}
@media (max-width: 640px) {
  .blog-grid { grid-template-columns: 1fr; }
  .blog-hero h1 { font-size: 32px; }
}
</style>
@endpush

@section('content')
{{-- ── HERO ── --}}
<div class="blog-hero">
  <div class="blog-hero-badge">
    <i class="fas fa-newspaper"></i>
    {{ isset($current_cat) ? 'Kategori' : 'Warta & Informasi' }}
  </div>
  <h1>{{ isset($current_cat) ? $current_cat->name : 'Berita & Artikel' }}</h1>
  <p>{{ isset($current_cat)
    ? 'Kumpulan kabar terbaru dalam kategori ' . $current_cat->name
    : 'Ikuti informasi terhangat seputar teknologi, akademik, dan kegiatan TJKT SMK Fadris.' }}</p>
</div>

{{-- ── MAIN CONTENT ── --}}
<div class="blog-main">
  <div class="blog-inner">

    {{-- Main Posts Column --}}
    <div>
      {{-- Category Filter Pills --}}
      @if($categories->isNotEmpty())
      <div class="cat-filter-row">
        <a href="{{ route('blog.index') }}" class="cat-pill {{ !isset($current_cat) ? 'active' : '' }}">
          <i class="fas fa-border-all"></i> Semua
        </a>
        @foreach($categories as $cat)
        <a href="{{ route('blog.category', $cat->slug) }}" class="cat-pill {{ isset($current_cat) && $current_cat->id == $cat->id ? 'active' : '' }}">
          {{ $cat->name }}
          <span style="font-weight:400; font-size:11px; opacity:0.7;">({{ $cat->posts_count }})</span>
        </a>
        @endforeach
      </div>
      @endif

      {{-- Posts Grid --}}
      @if($posts->isEmpty())
      <div class="blog-empty">
        <div class="blog-empty-icon">🗞️</div>
        <h3>Belum Ada Artikel</h3>
        <p>Editor kami sedang merangkum berita menarik. Coba lagi nanti!</p>
      </div>
      @else
      <div class="blog-grid">
        @foreach($posts as $post)
        <a href="{{ route('blog.show', $post->slug) }}" class="post-card">
          {{-- Thumbnail --}}
          @if($post->featured_image)
            <img src="{{ asset($post->featured_image) }}" alt="{{ $post->title }}" class="post-card-img">
          @elseif($post->images->isNotEmpty())
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
            <p class="post-card-excerpt">{{ $post->excerpt }}</p>
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

      <div class="blog-pagination">
        {{ $posts->links() }}
      </div>
      @endif
    </div>

    {{-- Sidebar --}}
    <aside class="blog-sidebar">
      {{-- Categories Widget --}}
      <div class="sidebar-widget">
        <div class="sidebar-widget-title"><i class="fas fa-th-large"></i> Kategori</div>
        <ul class="sidebar-cat-list">
          <li>
            <a href="{{ route('blog.index') }}" class="{{ !isset($current_cat) ? 'active' : '' }}">
              <span>Semua Berita</span>
              <i class="fas fa-chevron-right" style="font-size:10px; opacity:0.4;"></i>
            </a>
          </li>
          @foreach($categories as $cat)
          <li>
            <a href="{{ route('blog.category', $cat->slug) }}" class="{{ isset($current_cat) && $current_cat->id == $cat->id ? 'active' : '' }}">
              <span>{{ $cat->name }}</span>
              <span class="sidebar-count">{{ $cat->posts_count }}</span>
            </a>
          </li>
          @endforeach
        </ul>
      </div>

      {{-- CTA Widget --}}
      <div class="sidebar-cta">
        <h4>📬 Ingin Bergabung?</h4>
        <p>Persiapkan karier masa depan cerilang di bidang IT & Networking bersama ribuan lulusan sukses TJKT SMK Fadris.</p>
        <a href="{{ route('home') }}#kontak" class="sidebar-cta-btn">Daftar Sekarang</a>
      </div>
    </aside>

  </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Swiper for multi-image posts if any
    if (typeof Swiper !== 'undefined') {
        const swipers = document.querySelectorAll('.post-swiper');
        swipers.forEach(el => {
            new Swiper(el, {
                loop: true,
                pagination: { el: '.swiper-pagination', clickable: true },
                navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev' },
                autoplay: { delay: 3000, disableOnInteraction: false }
            });
        });
    }
});
</script>
@endpush
