@extends('layout')

@section('title', 'Pusat Download')

@push('styles')
<style>
/* ===== DOWNLOAD HERO ===== */
.download-hero {
  background: linear-gradient(135deg, var(--primary, #0F2447) 0%, #1a3a6e 60%, #00C8FF22 100%);
  padding: 100px 0 56px;
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

/* ===== SECTION ===== */
.download-section {
  padding: 56px 0 80px;
  background: #F4F7FC;
}

/* ===== FILTER TABS ===== */
.download-filter {
  display: flex;
  flex-wrap: wrap;
  gap: 8px;
  margin-bottom: 28px;
}
.download-filter-btn {
  padding: 7px 18px;
  border-radius: 100px;
  border: 1.5px solid rgba(15,36,71,.15);
  background: #fff;
  color: var(--primary, #0F2447);
  font-weight: 600;
  font-size: 13px;
  cursor: pointer;
  transition: all .2s;
  text-decoration: none;
  white-space: nowrap;
}
.download-filter-btn:hover,
.download-filter-btn.active {
  background: var(--primary, #0F2447);
  color: #fff;
  border-color: var(--primary, #0F2447);
}

/* ===== SEARCH BAR ===== */
.dl-search-wrap {
  position: relative;
  margin-bottom: 20px;
  max-width: 340px;
}
.dl-search-wrap i {
  position: absolute;
  left: 14px;
  top: 50%;
  transform: translateY(-50%);
  color: #aaa;
  font-size: 14px;
}
.dl-search-input {
  width: 100%;
  padding: 10px 14px 10px 38px;
  border-radius: 10px;
  border: 1.5px solid rgba(15,36,71,.12);
  background: #fff;
  font-size: 14px;
  outline: none;
  transition: border-color .2s;
  box-sizing: border-box;
}
.dl-search-input:focus {
  border-color: var(--primary, #0F2447);
}

/* ===== TABLE CARD ===== */
.dl-table-card {
  background: #fff;
  border-radius: 18px;
  border: 1.5px solid rgba(15,36,71,.08);
  overflow: hidden;
  box-shadow: 0 4px 24px rgba(15,36,71,.06);
}
.dl-table-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 18px 24px;
  border-bottom: 1.5px solid rgba(15,36,71,.06);
  gap: 12px;
  flex-wrap: wrap;
}
.dl-table-header-left {
  font-weight: 700;
  font-size: 1rem;
  color: var(--primary, #0F2447);
  display: flex;
  align-items: center;
  gap: 8px;
}
.dl-count-badge {
  background: rgba(15,36,71,.07);
  color: var(--primary,#0F2447);
  font-size: 12px;
  font-weight: 700;
  padding: 3px 10px;
  border-radius: 100px;
}
.dl-table {
  width: 100%;
  border-collapse: collapse;
}
.dl-table thead tr {
  background: #F8FAFD;
}
.dl-table thead th {
  padding: 12px 16px;
  text-align: left;
  font-size: 11px;
  font-weight: 700;
  letter-spacing: .07em;
  text-transform: uppercase;
  color: #8a96a8;
  border-bottom: 1.5px solid rgba(15,36,71,.07);
  white-space: nowrap;
}
.dl-table tbody tr {
  border-bottom: 1px solid rgba(15,36,71,.05);
  transition: background .15s;
}
.dl-table tbody tr:last-child {
  border-bottom: none;
}
.dl-table tbody tr:hover {
  background: #F8FAFD;
}
.dl-table td {
  padding: 14px 16px;
  vertical-align: middle;
  font-size: 0.9rem;
}

/* File icon cell */
.dl-file-icon {
  width: 40px;
  height: 40px;
  border-radius: 10px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 18px;
  flex-shrink: 0;
}
.dl-file-icon.icon-pdf  { background: #fff1f2; }
.dl-file-icon.icon-doc  { background: #eff6ff; }
.dl-file-icon.icon-xls  { background: #f0fdf4; }
.dl-file-icon.icon-img  { background: #fdf4ff; }
.dl-file-icon.icon-link { background: #f0f9ff; }
.dl-file-icon.icon-misc { background: #fafafa; }

.dl-title-col {
  display: flex;
  align-items: center;
  gap: 12px;
}
.dl-title-text {
  font-weight: 600;
  color: var(--primary, #0F2447);
  font-size: 0.92rem;
  line-height: 1.3;
}
.dl-desc-text {
  font-size: 0.78rem;
  color: #888;
  margin-top: 2px;
}

/* Badge kategori */
.dl-kat-badge {
  display: inline-block;
  padding: 3px 10px;
  border-radius: 100px;
  font-size: 11px;
  font-weight: 700;
  letter-spacing: .04em;
  background: rgba(0,200,255,.10);
  color: #007ea0;
  border: 1px solid rgba(0,200,255,.2);
  white-space: nowrap;
}

/* Tipe badge */
.dl-tipe-badge {
  display: inline-flex;
  align-items: center;
  gap: 4px;
  padding: 3px 10px;
  border-radius: 100px;
  font-size: 11px;
  font-weight: 700;
}
.dl-tipe-badge.pdf  { background:#fff1f2; color:#e11d48; }
.dl-tipe-badge.doc  { background:#eff6ff; color:#2563eb; }
.dl-tipe-badge.xls  { background:#f0fdf4; color:#16a34a; }
.dl-tipe-badge.link { background:#f0f9ff; color:#0891b2; }
.dl-tipe-badge.file { background:#f5f3ff; color:#7c3aed; }

.dl-counter {
  font-size: 12px;
  color: #aaa;
  white-space: nowrap;
  display: flex;
  align-items: center;
  gap: 4px;
}

/* Action buttons */
.dl-actions {
  display: flex;
  gap: 6px;
  align-items: center;
  flex-wrap: nowrap;
}
.dl-btn {
  display: inline-flex;
  align-items: center;
  gap: 5px;
  padding: 7px 14px;
  border-radius: 8px;
  font-size: 12px;
  font-weight: 700;
  text-decoration: none;
  cursor: pointer;
  border: none;
  transition: opacity .18s, transform .18s;
  white-space: nowrap;
}
.dl-btn:hover { opacity: .85; transform: translateY(-1px); }
.dl-btn-primary {
  background: linear-gradient(135deg, var(--primary,#0F2447), #1a3a6e);
  color: #fff;
}
.dl-btn-preview {
  background: linear-gradient(135deg, #e11d48, #be123c);
  color: #fff;
}
.dl-btn-link {
  background: linear-gradient(135deg, #0891b2, #0ea5e9);
  color: #fff;
}
.dl-btn-outline {
  background: transparent;
  color: var(--primary,#0F2447);
  border: 1.5px solid rgba(15,36,71,.15);
}
.dl-btn-outline:hover { background: rgba(15,36,71,.05); }

/* Empty state */
.dl-empty {
  text-align: center;
  padding: 60px 20px;
  color: #bbb;
}
.dl-empty i { font-size: 48px; margin-bottom: 14px; display: block; opacity:.4; }
.dl-empty p { font-size: 0.92rem; }

/* ===== PDF PREVIEW MODAL ===== */
.pdf-modal-overlay {
  position: fixed;
  inset: 0;
  background: rgba(0,0,0,.65);
  z-index: 9000;
  display: none;
  align-items: center;
  justify-content: center;
  padding: 20px;
  backdrop-filter: blur(4px);
}
.pdf-modal-overlay.open { display: flex; }
.pdf-modal {
  background: #fff;
  border-radius: 18px;
  width: 100%;
  max-width: 860px;
  max-height: 90vh;
  display: flex;
  flex-direction: column;
  overflow: hidden;
  box-shadow: 0 24px 80px rgba(0,0,0,.3);
  animation: modalIn .22s ease;
}
@keyframes modalIn {
  from { opacity:0; transform: scale(.96) translateY(12px); }
  to   { opacity:1; transform: scale(1) translateY(0); }
}
.pdf-modal-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 16px 20px;
  border-bottom: 1.5px solid rgba(15,36,71,.08);
  gap: 12px;
}
.pdf-modal-title {
  font-weight: 700;
  font-size: 0.95rem;
  color: var(--primary,#0F2447);
  flex: 1;
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
}
.pdf-modal-actions {
  display: flex;
  gap: 8px;
  align-items: center;
}
.pdf-modal-close {
  width: 32px; height: 32px;
  border-radius: 8px;
  border: none;
  background: #f3f4f6;
  color: #555;
  cursor: pointer;
  font-size: 16px;
  display: flex; align-items: center; justify-content: center;
  transition: background .15s;
}
.pdf-modal-close:hover { background: #e5e7eb; }
.pdf-modal-body {
  flex: 1;
  overflow: hidden;
  position: relative;
  min-height: 400px;
  background: #525659;
}
.pdf-modal-body iframe {
  width: 100%;
  height: 100%;
  min-height: 500px;
  border: none;
}
.pdf-modal-loading {
  position: absolute;
  inset: 0;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  color: #ccc;
  gap: 14px;
  font-size: 14px;
}
.pdf-modal-loading i { font-size: 36px; opacity: .5; }
.pdf-modal-footer {
  padding: 12px 20px;
  border-top: 1.5px solid rgba(15,36,71,.07);
  display: flex;
  align-items: center;
  gap: 10px;
  flex-wrap: wrap;
}
.pdf-modal-footer-note {
  flex: 1;
  font-size: 11px;
  color: #aaa;
}

/* Responsive table */
@media (max-width: 768px) {
  .dl-table thead { display: none; }
  .dl-table tbody tr { display: block; padding: 16px; border-bottom: 1.5px solid rgba(15,36,71,.07); }
  .dl-table td { display: flex; align-items: flex-start; gap: 8px; padding: 4px 0; font-size: 0.85rem; }
  .dl-table td::before { content: attr(data-label); font-weight: 700; min-width: 80px; color: #888; font-size: 11px; flex-shrink:0; margin-top:2px; }
  .dl-actions { flex-wrap: wrap; }
  .pdf-modal { max-height: 95vh; }
  .pdf-modal-body iframe { min-height: 320px; }
}
</style>
@endpush

@section('content')

{{-- HERO --}}
<section class="download-hero">
  <div class="container" style="position:relative; z-index:1;">
    <div class="download-hero-eyebrow">
      <i class="fas fa-download"></i> Pusat Download
    </div>
    <h1 class="download-hero-title">📥 Pusat Download</h1>
    <p class="download-hero-sub">Unduh modul, formulir, panduan, dan dokumen resmi jurusan TJKT SMK Fadris secara gratis.</p>
  </div>
</section>

{{-- MAIN SECTION --}}
<section class="download-section">
  <div class="container">

    {{-- Filter tabs --}}
    @if($kategoris->isNotEmpty())
    <div class="download-filter animate-on-scroll">
      <a href="{{ route('download.index') }}"
         class="download-filter-btn {{ $kategoriAktif === 'semua' ? 'active' : '' }}">
        <i class="fas fa-th-list" style="font-size:11px;"></i> Semua
      </a>
      @foreach($kategoris as $kat)
      <a href="{{ route('download.index', ['kategori' => $kat]) }}"
         class="download-filter-btn {{ $kategoriAktif === $kat ? 'active' : '' }}">
        {{ $kat }}
      </a>
      @endforeach
    </div>
    @endif

    {{-- Table card --}}
    <div class="dl-table-card animate-on-scroll">
      <div class="dl-table-header">
        <div class="dl-table-header-left">
          <i class="fas fa-folder-open" style="color:#0ea5e9;"></i>
          Daftar File Tersedia
          <span class="dl-count-badge">{{ $downloads->count() }} file</span>
        </div>
        <div class="dl-search-wrap">
          <i class="fas fa-search"></i>
          <input type="text" class="dl-search-input" id="dlSearch" placeholder="Cari file...">
        </div>
      </div>

      <div class="table-responsive" style="overflow-x:auto;">
        <table class="dl-table" id="dlTable">
          <thead>
            <tr>
              <th style="width:48px;">#</th>
              <th>Nama File / Dokumen</th>
              <th style="width:110px;">Kategori</th>
              <th style="width:90px;">Tipe</th>
              <th style="width:100px; text-align:center;">Diunduh</th>
              <th style="width:200px; text-align:right;">Aksi</th>
            </tr>
          </thead>
          <tbody id="dlTableBody">
            @forelse($downloads as $i => $item)
            @php
              // Deteksi tipe file
              $ext = '';
              if ($item->file_path) {
                $ext = strtolower(pathinfo($item->file_path, PATHINFO_EXTENSION));
              } elseif ($item->url_eksternal) {
                $ext = 'link';
              }
              $isPdf  = $ext === 'pdf';
              $isDoc  = in_array($ext, ['doc','docx']);
              $isXls  = in_array($ext, ['xls','xlsx','csv']);
              $isLink = $ext === 'link';
              $isImg  = in_array($ext, ['jpg','jpeg','png','gif','webp']);

              // Icon & warna
              if ($isPdf)       { $icon = '📄'; $iconClass = 'icon-pdf';  $badgeClass = 'pdf';  $badgeLabel = 'PDF';  }
              elseif ($isDoc)   { $icon = '📝'; $iconClass = 'icon-doc';  $badgeClass = 'doc';  $badgeLabel = 'Word'; }
              elseif ($isXls)   { $icon = '📊'; $iconClass = 'icon-xls';  $badgeClass = 'xls';  $badgeLabel = 'Excel';}
              elseif ($isLink)  { $icon = '🔗'; $iconClass = 'icon-link'; $badgeClass = 'link'; $badgeLabel = 'Link'; }
              elseif ($isImg)   { $icon = '🖼️'; $iconClass = 'icon-img';  $badgeClass = 'file'; $badgeLabel = 'Gambar';}
              else              { $icon = '📦'; $iconClass = 'icon-misc'; $badgeClass = 'file'; $badgeLabel = strtoupper($ext) ?: 'File'; }

              // Preview URL untuk PDF
              $previewUrl = '';
              if ($isPdf && $item->file_path) {
                $previewUrl = asset('storage/' . $item->file_path);
              } elseif ($isPdf && $item->url_eksternal) {
                $previewUrl = $item->url_eksternal;
              }

              $isFile = !empty($item->file_path);
            @endphp
            <tr class="dl-row" data-title="{{ strtolower($item->judul) }} {{ strtolower($item->kategori ?? '') }}">
              <td data-label="#">
                <span style="font-size:12px; color:#aaa; font-weight:600;">{{ $i + 1 }}</span>
              </td>
              <td data-label="Nama File">
                <div class="dl-title-col">
                  <div class="dl-file-icon {{ $iconClass }}">{{ $icon }}</div>
                  <div>
                    <div class="dl-title-text">{{ $item->judul }}</div>
                    @if($item->deskripsi)
                    <div class="dl-desc-text">{{ Str::limit($item->deskripsi, 80) }}</div>
                    @endif
                  </div>
                </div>
              </td>
              <td data-label="Kategori">
                <span class="dl-kat-badge">{{ $item->kategori ?? 'Umum' }}</span>
              </td>
              <td data-label="Tipe">
                <span class="dl-tipe-badge {{ $badgeClass }}">
                  <i class="fas fa-{{ $isPdf ? 'file-pdf' : ($isLink ? 'link' : ($isDoc ? 'file-word' : ($isXls ? 'file-excel' : 'file'))) }}" style="font-size:10px;"></i>
                  {{ $badgeLabel }}
                </span>
              </td>
              <td data-label="Diunduh" style="text-align:center;">
                <div class="dl-counter">
                  <i class="fas fa-download" style="font-size:10px;"></i>
                  {{ number_format($item->jumlah_download) }}×
                </div>
              </td>
              <td data-label="Aksi" style="text-align:right;">
                <div class="dl-actions" style="justify-content:flex-end;">
                  {{-- Tombol Preview (hanya jika PDF) --}}
                  @if($isPdf && $previewUrl)
                  <button class="dl-btn dl-btn-preview"
                          onclick="previewPDF('{{ $previewUrl }}', '{{ addslashes($item->judul) }}')"
                          title="Preview PDF">
                    <i class="fas fa-eye"></i> Preview
                  </button>
                  @endif

                  {{-- Tombol Unduh / Buka Link --}}
                  @if($isLink)
                  <a href="{{ route('download.get', $item->id) }}"
                     class="dl-btn dl-btn-link"
                     target="_blank" rel="noopener"
                     title="Buka Link">
                    <i class="fas fa-external-link-alt"></i> Buka
                  </a>
                  @else
                  <a href="{{ route('download.get', $item->id) }}"
                     class="dl-btn dl-btn-primary"
                     title="Unduh File">
                    <i class="fas fa-download"></i> Unduh
                  </a>
                  @endif
                </div>
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="6">
                <div class="dl-empty">
                  <i class="fas fa-folder-open"></i>
                  <p>Belum ada file untuk kategori ini.</p>
                </div>
              </td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>{{-- /.dl-table-card --}}

  </div>
</section>

{{-- ===== PDF PREVIEW MODAL ===== --}}
<div class="pdf-modal-overlay" id="pdfModal" role="dialog" aria-modal="true" aria-label="Preview PDF">
  <div class="pdf-modal">
    <div class="pdf-modal-header">
      <div class="pdf-modal-title" id="pdfModalTitle">Preview Dokumen</div>
      <div class="pdf-modal-actions">
        <a class="dl-btn dl-btn-primary" id="pdfModalDownload" href="#" target="_blank" rel="noopener" style="font-size:12px; padding:6px 12px;">
          <i class="fas fa-download"></i> Unduh
        </a>
        <button class="pdf-modal-close" onclick="closePdfModal()" aria-label="Tutup">
          <i class="fas fa-times"></i>
        </button>
      </div>
    </div>
    <div class="pdf-modal-body" id="pdfModalBody">
      <div class="pdf-modal-loading" id="pdfLoading">
        <i class="fas fa-spinner fa-spin"></i>
        <span>Memuat dokumen...</span>
      </div>
      <iframe id="pdfIframe" src="" title="PDF Preview" allowfullscreen
              onload="document.getElementById('pdfLoading').style.display='none';"
              style="display:none;"></iframe>
    </div>
    <div class="pdf-modal-footer">
      <span class="pdf-modal-footer-note">
        <i class="fas fa-info-circle"></i>
        Jika preview tidak muncul, klik tombol "Unduh" untuk membuka file.
      </span>
      <a class="dl-btn dl-btn-outline" id="pdfModalOpenNew" href="#" target="_blank" rel="noopener" style="font-size:12px; padding:6px 12px;">
        <i class="fas fa-external-link-alt"></i> Buka di Tab Baru
      </a>
    </div>
  </div>
</div>

@endsection

@push('scripts')
<script>
/* ===== LIVE SEARCH ===== */
document.getElementById('dlSearch').addEventListener('input', function() {
  const q = this.value.toLowerCase().trim();
  document.querySelectorAll('#dlTableBody .dl-row').forEach(function(row) {
    const text = row.getAttribute('data-title') || '';
    row.style.display = (!q || text.includes(q)) ? '' : 'none';
  });
});

/* ===== PDF PREVIEW MODAL ===== */
function previewPDF(url, title) {
  // Reset state
  const iframe    = document.getElementById('pdfIframe');
  const loading   = document.getElementById('pdfLoading');
  const modalTitle = document.getElementById('pdfModalTitle');
  const dlBtn     = document.getElementById('pdfModalDownload');
  const openBtn   = document.getElementById('pdfModalOpenNew');

  modalTitle.textContent = title;
  dlBtn.href  = url;
  openBtn.href = url;

  loading.style.display = 'flex';
  iframe.style.display  = 'none';
  iframe.src = '';

  // Buka modal
  document.getElementById('pdfModal').classList.add('open');
  document.body.style.overflow = 'hidden';

  // Load iframe (untuk URL Google Drive, gunakan embed)
  let embedUrl = url;
  if (url.includes('drive.google.com')) {
    // Convert drive link ke embed format
    embedUrl = url.replace('/view', '/preview').replace('/edit', '/preview');
    if (!embedUrl.includes('/preview')) {
      embedUrl = url + (url.includes('?') ? '&' : '?') + 'embedded=true';
    }
  }

  setTimeout(function() {
    iframe.src = embedUrl;
    iframe.style.display = 'block';
  }, 150);
}

function closePdfModal() {
  document.getElementById('pdfModal').classList.remove('open');
  document.body.style.overflow = '';
  // Hentikan iframe agar audio/video berhenti
  setTimeout(function() {
    document.getElementById('pdfIframe').src = '';
  }, 200);
}

// Tutup modal saat klik overlay
document.getElementById('pdfModal').addEventListener('click', function(e) {
  if (e.target === this) closePdfModal();
});

// Tutup dengan Escape
document.addEventListener('keydown', function(e) {
  if (e.key === 'Escape') closePdfModal();
});
</script>
@endpush
