@extends('layout')

@section('title', $post->title)

@push('styles')
<style>
/* ── Post Header ── */
.post-detail-hero {
  background: linear-gradient(135deg, var(--primary-dark, #0A1C36) 0%, #1e40af 50%, var(--primary, #0F2447) 100%);
  padding: 160px 5% 64px;
  margin-top: 0;
  position: relative;
  overflow: hidden;
}
.post-breadcrumb {
  font-size: 13px;
  font-weight: 600;
  color: rgba(255, 255, 255, 0.6);
  margin-bottom: 24px;
  display: flex;
  align-items: center;
  gap: 8px;
}
.post-breadcrumb a { color: #38BDF8; text-decoration: none; }
.post-breadcrumb a:hover { text-decoration: underline; }
.post-breadcrumb span { opacity: 0.6; }
.post-cat-tag {
  display: inline-block;
  background: rgba(255, 255, 255, 0.1);
  border: 1px solid rgba(255, 255, 255, 0.2);
  color: #38BDF8;
  padding: 5px 14px;
  border-radius: 6px;
  font-size: 11px;
  font-weight: 800;
  text-transform: uppercase;
  letter-spacing: 0.08em;
  margin-bottom: 20px;
}
.post-main-title {
  font-family: 'Space Grotesk', sans-serif;
  font-size: clamp(28px, 4vw, 48px);
  font-weight: 800;
  color: #ffffff;
  line-height: 1.15;
  margin-bottom: 28px;
  max-width: 820px;
}
.post-author-bar {
  display: flex;
  align-items: center;
  gap: 20px;
  padding-top: 20px;
  border-top: 1px solid rgba(255, 255, 255, 0.15);
  flex-wrap: wrap;
}
.post-author-avatar {
  width: 42px; height: 42px;
  border-radius: 50%;
  background: rgba(255, 255, 255, 0.1);
  display: flex; align-items: center; justify-content: center;
  font-size: 16px; font-weight: 700; color: #38BDF8;
  flex-shrink: 0;
}
.post-author-info strong { font-size: 14px; color: #ffffff; display: block; }
.post-author-info span { font-size: 12px; color: rgba(255, 255, 255, 0.6); }
.post-meta-divider { width: 1px; height: 32px; background: rgba(255, 255, 255, 0.15); }

/* ── Main Content Area ── */
.post-main {
  background: #ffffff;
  padding: 64px 5%;
}
.post-body-inner {
  display: grid;
  grid-template-columns: 1fr 280px;
  gap: 56px;
  max-width: 1200px;
  margin: 0 auto;
}

/* ── Featured Image ── */
.post-featured-img {
  width: 100%;
  border-radius: 16px;
  aspect-ratio: 16/7;
  object-fit: cover;
  margin-bottom: 40px;
  border: 1px solid rgba(15, 36, 71, 0.08);
}

/* ── Article Body ── */
.post-article-content {
  font-size: 16px;
  line-height: 1.85;
  color: var(--text-body);
}
.post-article-content h2,
.post-article-content h3,
.post-article-content h4 {
  font-family: 'Space Grotesk', sans-serif;
  color: var(--text-primary);
  font-weight: 700;
  margin-top: 40px;
  margin-bottom: 16px;
}
.post-article-content h2 { font-size: 26px; }
.post-article-content h3 { font-size: 21px; }
.post-article-content p { margin-bottom: 20px; }
.post-article-content a { color: #0EA5E9; text-decoration: underline; }
.post-article-content blockquote {
  border-left: 3px solid #0EA5E9;
  background: rgba(14,165,233,0.04);
  border-radius: 0 10px 10px 0;
  padding: 20px 24px;
  margin: 28px 0;
  color: var(--text-secondary);
  font-style: italic;
}
.post-article-content ul, .post-article-content ol {
  padding-left: 24px;
  margin-bottom: 20px;
}
.post-article-content li { margin-bottom: 6px; }
.post-article-content img {
  max-width: 100%;
  border-radius: 10px;
  border: 1px solid rgba(15, 36, 71, 0.08);
  margin: 20px 0;
}
.post-article-content pre, .post-article-content code {
  background: #F4F7FC;
  border-radius: 6px;
  font-family: monospace;
}
.post-article-content pre { padding: 16px 20px; overflow-x: auto; margin-bottom: 20px; border: 1px solid rgba(15, 36, 71, 0.05); }
.post-article-content code { padding: 2px 6px; font-size: 14px; }

/* ── Gallery ── */
.post-gallery {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 12px;
  margin-top: 48px;
  padding-top: 40px;
  border-top: 1px solid rgba(15, 36, 71, 0.08);
}
.post-gallery img {
  width: 100%;
  aspect-ratio: 4/3;
  object-fit: cover;
  border-radius: 10px;
  border: 1px solid rgba(15, 36, 71, 0.08);
  cursor: pointer;
  transition: transform 0.2s, opacity 0.2s;
}
.post-gallery img:hover { transform: scale(1.02); opacity: 0.9; }

/* ── Back / Share Row ── */
.post-actions {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding-top: 40px;
  margin-top: 40px;
  border-top: 1px solid rgba(15, 36, 71, 0.08);
  flex-wrap: wrap;
  gap: 12px;
}
.btn-back {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  padding: 10px 20px;
  background: #F4F7FC;
  border: 1px solid rgba(15, 36, 71, 0.08);
  border-radius: 8px;
  color: var(--text-secondary);
  font-size: 13px;
  font-weight: 600;
  text-decoration: none;
  transition: all 0.2s;
}
.btn-back:hover { background: rgba(14,165,233,0.06); color: #0EA5E9; }

/* ── Sidebar ── */
.post-sidebar {
  position: sticky;
  top: 90px;
}
.sidebar-widget {
  background: #ffffff;
  border: 1px solid rgba(15, 36, 71, 0.08);
  border-radius: 16px;
  padding: 22px;
  margin-bottom: 20px;
  box-shadow: 0 4px 20px rgba(15, 36, 71, 0.02);
}
.sidebar-widget-title {
  font-family: 'Space Grotesk', sans-serif;
  font-size: 12px;
  font-weight: 700;
  letter-spacing: 0.08em;
  text-transform: uppercase;
  color: #0EA5E9;
  margin-bottom: 18px;
}
.recent-post-item {
  display: flex;
  gap: 12px;
  padding: 12px 0;
  border-bottom: 1px solid rgba(15, 36, 71, 0.05);
  text-decoration: none;
  transition: opacity 0.2s;
}
.recent-post-item:last-child { border-bottom: none; }
.recent-post-item:hover { opacity: 0.75; }
.recent-post-thumb {
  width: 56px; height: 56px;
  border-radius: 8px;
  object-fit: cover;
  flex-shrink: 0;
  border: 1px solid rgba(15, 36, 71, 0.08);
  background: #F4F7FC;
  display: flex; align-items: center; justify-content: center;
  color: rgba(15, 36, 71, 0.15); font-size: 20px;
}
.recent-post-info strong {
  font-size: 13px;
  font-weight: 700;
  color: var(--text-primary);
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
  line-height: 1.35;
}
.recent-post-info span {
  font-size: 11px;
  color: var(--text-secondary);
  margin-top: 4px;
  display: block;
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
  padding: 9px 12px;
  border-radius: 8px;
  background: #F4F7FC;
  border: 1px solid rgba(15, 36, 71, 0.05);
  text-decoration: none;
  color: var(--text-secondary);
  font-size: 13px;
  font-weight: 600;
  transition: all 0.2s;
}
.sidebar-cat-list a:hover { background: rgba(14,165,233,0.06); color: #0EA5E9; border-color: rgba(14,165,233,0.30); }
.sidebar-count { font-size: 11px; background: rgba(15, 36, 71, 0.05); padding: 2px 7px; border-radius: 99px; color: var(--text-secondary); }

/* ── Responsive ── */
@media (max-width: 900px) {
  .post-body-inner { grid-template-columns: 1fr; }
  .post-sidebar { position: static; }
  .post-gallery { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 480px) {
  .post-gallery { grid-template-columns: 1fr; }
  .post-detail-hero { padding: 100px 5% 48px; }
}
</style>
@endpush

@section('content')
{{-- ── HERO HEADER ── --}}
<div class="post-detail-hero">
  <div class="post-breadcrumb">
    <a href="{{ route('home') }}">Home</a>
    <span>›</span>
    <a href="{{ route('blog.index') }}">Berita</a>
    @if($post->category)
    <span>›</span>
    <a href="{{ route('blog.category', $post->category->slug) }}">{{ $post->category->name }}</a>
    @endif
    <span>›</span>
    <span style="color:rgba(255, 255, 255, 0.6); max-width:300px; overflow:hidden; text-overflow:ellipsis; white-space:nowrap;">{{ Str::limit($post->title, 50) }}</span>
  </div>

  @if($post->category)
  <span class="post-cat-tag">{{ $post->category->name }}</span>
  @endif

  <h1 class="post-main-title">{{ $post->title }}</h1>

  <div class="post-author-bar">
    <div class="post-author-avatar">{{ strtoupper(substr($post->author->nama ?? 'A', 0, 1)) }}</div>
    <div class="post-author-info">
      <strong>{{ $post->author->nama ?? 'Admin' }}</strong>
      <span>Penulis</span>
    </div>
    <div class="post-meta-divider"></div>
    <div class="post-author-info">
      <strong>{{ $post->created_at->translatedFormat('d F Y') }}</strong>
      <span>Tanggal Terbit</span>
    </div>
    @if($post->images->count() > 0)
    <div class="post-meta-divider"></div>
    <div class="post-author-info">
      <strong>{{ $post->images->count() }} Foto</strong>
      <span>Galeri</span>
    </div>
    @endif
  </div>
</div>

{{-- ── MAIN ARTICLE ── --}}
<div class="post-main">
  <div class="post-body-inner">

    {{-- Article Content --}}
    <article>
      {{-- Featured Image --}}
      @if($post->featured_image)
        <img src="{{ asset($post->featured_image) }}" alt="{{ $post->title }}" class="post-featured-img">
      @elseif($post->images->isNotEmpty())
        <img src="{{ asset($post->images->first()->image_path) }}" alt="{{ $post->title }}" class="post-featured-img">
      @endif

      {{-- Body --}}
      <div class="post-article-content">
        {!! $post->content !!}
      </div>

      {{-- Gallery --}}
      @if($post->images->count() > 1)
      <div>
        <div style="font-family:'Space Grotesk',sans-serif; font-size:14px; font-weight:700; color:#0EA5E9; letter-spacing:0.06em; text-transform:uppercase; margin-bottom:20px; margin-top:48px;">
          <i class="fas fa-images"></i> Galeri Foto
        </div>
        <div class="post-gallery">
          @foreach($post->images as $img)
          <img src="{{ asset($img->image_path) }}" alt="{{ $post->title }}" loading="lazy">
          @endforeach
        </div>
      </div>
      @endif

      {{-- Actions --}}
      <div class="post-actions">
        <a href="{{ route('blog.index') }}" class="btn-back">
          <i class="fas fa-arrow-left"></i> Kembali ke Berita
        </a>
        <div style="display:flex; gap:10px;">
          <span style="font-size:13px; color:var(--text-secondary); align-self:center;">Bagikan:</span>
          <a href="https://wa.me/?text={{ urlencode($post->title . ' ' . url()->current()) }}" target="_blank" rel="noopener"
             style="width:36px;height:36px;border-radius:8px;background:rgba(37,211,102,0.15);border:1px solid rgba(37,211,102,0.3);display:flex;align-items:center;justify-content:center;color:#25D366;text-decoration:none;transition:all 0.2s;">
            <i class="fab fa-whatsapp"></i>
          </a>
          <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank" rel="noopener"
             style="width:36px;height:36px;border-radius:8px;background:rgba(24,119,242,0.15);border:1px solid rgba(24,119,242,0.3);display:flex;align-items:center;justify-content:center;color:#1877F2;text-decoration:none;transition:all 0.2s;">
            <i class="fab fa-facebook-f"></i>
          </a>
        </div>
      </div>
    </article>

    {{-- Sidebar --}}
    <aside class="post-sidebar">
      {{-- Recent Posts --}}
      @if($recent_posts->isNotEmpty())
      <div class="sidebar-widget">
        <div class="sidebar-widget-title"><i class="fas fa-clock"></i> Artikel Terkini</div>
        @foreach($recent_posts as $rp)
        <a href="{{ route('blog.show', $rp->slug) }}" class="recent-post-item">
          @if($rp->featured_image)
            <img src="{{ asset($rp->featured_image) }}" alt="{{ $rp->title }}" class="recent-post-thumb">
          @else
            <div class="recent-post-thumb">📄</div>
          @endif
          <div class="recent-post-info">
            <strong>{{ $rp->title }}</strong>
            <span>{{ $rp->created_at->diffForHumans() }}</span>
          </div>
        </a>
        @endforeach
      </div>
      @endif

      {{-- Categories --}}
      <div class="sidebar-widget">
        <div class="sidebar-widget-title"><i class="fas fa-th-large"></i> Kategori</div>
        <ul class="sidebar-cat-list">
          <li><a href="{{ route('blog.index') }}"><span>Semua Berita</span> <i class="fas fa-chevron-right" style="font-size:10px;opacity:0.3;"></i></a></li>
          @foreach($categories as $cat)
          <li>
            <a href="{{ route('blog.category', $cat->slug) }}">
              <span>{{ $cat->name }}</span>
              <span class="sidebar-count">{{ $cat->posts_count }}</span>
            </a>
          </li>
          @endforeach
        </ul>
      </div>
    </aside>

  </div>
</div>
@endsection
