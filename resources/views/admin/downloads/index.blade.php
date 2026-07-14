@extends('admin.layout')

@section('title', 'Pusat Download')
@section('page_title', 'Pusat Download')
@section('page_subtitle', 'Kelola file dan tautan yang dapat diunduh pengunjung')

@section('content')
<div class="card">
  <div class="card-header" style="display:flex; justify-content:space-between; align-items:center;">
    <h2 class="card-title">Daftar File Download</h2>
    <button class="btn btn-primary btn-sm" onclick="openFormModal()">
      <i class="fas fa-plus"></i> Tambah Data
    </button>
  </div>
  <div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th width="60">No</th>
          <th>Judul</th>
          <th width="110">Kategori</th>
          <th width="80">Tipe</th>
          <th width="80">Urutan</th>
          <th width="90">Unduhan</th>
          <th width="100">Status</th>
          <th width="130">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse($data as $i => $row)
        <tr>
          <td style="text-align:center">{{ $i + 1 }}</td>
          <td>
            <strong>{{ $row->judul }}</strong>
            @if($row->deskripsi)
              <div style="font-size:0.78rem; color:#888; margin-top:2px;">{{ Str::limit($row->deskripsi, 70) }}</div>
            @endif
          </td>
          <td>
            <span class="badge badge-success">{{ $row->kategori ?? 'Umum' }}</span>
          </td>
          <td style="text-align:center">
            @if($row->file_path)
              <span class="badge" style="background:#e0f2fe; color:#0369a1; border:1px solid #bae6fd;"><i class="fas fa-file"></i> File</span>
            @else
              <span class="badge" style="background:#f0fdf4; color:#166534; border:1px solid #bbf7d0;"><i class="fas fa-link"></i> Link</span>
            @endif
          </td>
          <td style="text-align:center">{{ $row->urutan }}</td>
          <td style="text-align:center">
            <span style="font-size:0.82rem; color:#555;"><i class="fas fa-download" style="font-size:10px;"></i> {{ number_format($row->jumlah_download) }}×</span>
          </td>
          <td>
            @if($row->aktif)
              <span class="badge badge-success">Aktif</span>
            @else
              <span class="badge badge-danger">Nonaktif</span>
            @endif
          </td>
          <td>
            <div style="display:flex; gap:0.5rem">
              <button class="btn btn-secondary btn-sm" onclick='editData(@json($row))' title="Edit">
                <i class="fas fa-edit"></i>
              </button>
              <form method="POST" action="{{ route('admin.downloads.destroy', $row->id) }}" onsubmit="return confirm('Yakin ingin menghapus file ini?');" style="margin:0">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" title="Hapus">
                  <i class="fas fa-trash"></i>
                </button>
              </form>
            </div>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="8" style="text-align:center; padding:2rem">Belum ada data download.</td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>

{{-- Modal Add/Edit --}}
<div class="modal-overlay" id="modal-form">
  <div class="modal" style="max-width: 560px;">
    <div class="modal-header">
      <h3 class="modal-title" id="modal-title">Tambah / Edit Data</h3>
      <button type="button" class="modal-close" onclick="closeModal('modal-form')"><i class="fas fa-times"></i></button>
    </div>
    <div class="modal-body">
      <form id="form-data" method="POST" action="" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" id="form-method" value="POST">

        <div class="form-group">
          <label class="form-label" for="judul">Judul File / Dokumen <span style="color:red">*</span></label>
          <input type="text" id="judul" name="judul" class="form-input" required placeholder="Contoh: Modul Jaringan Kelas X">
        </div>

        <div class="form-group">
          <label class="form-label" for="deskripsi">Deskripsi</label>
          <textarea id="deskripsi" name="deskripsi" class="form-input" rows="2" style="resize:vertical;" placeholder="Keterangan singkat (opsional)"></textarea>
        </div>

        <div class="form-group">
          <label class="form-label" for="kategori">Kategori</label>
          <input type="text" id="kategori" name="kategori" class="form-input" placeholder="Contoh: Modul, Formulir, Sertifikat" list="kategori-list">
          <datalist id="kategori-list">
            <option value="Modul">
            <option value="Formulir">
            <option value="Sertifikat">
            <option value="Panduan">
            <option value="Silabus">
            <option value="Umum">
          </datalist>
          <div class="form-help">Ketik atau pilih kategori yang sudah ada</div>
        </div>

        {{-- Tipe sumber --}}
        <div class="form-group">
          <label class="form-label">Sumber File</label>
          <div style="display:flex; gap:16px; margin-bottom:10px;">
            <label style="display:flex; align-items:center; gap:6px; cursor:pointer; font-weight:500;">
              <input type="radio" name="sumber_tipe" value="link" id="sumber-link" checked onchange="toggleSumber(this.value)">
              <i class="fas fa-link" style="color:#0ea5e9;"></i> URL / Link Eksternal
            </label>
            <label style="display:flex; align-items:center; gap:6px; cursor:pointer; font-weight:500;">
              <input type="radio" name="sumber_tipe" value="file" id="sumber-file" onchange="toggleSumber(this.value)">
              <i class="fas fa-file-upload" style="color:#10b981;"></i> Upload File Lokal
            </label>
          </div>

          <div id="wrap-url-eksternal">
            <input type="url" id="url_eksternal" name="url_eksternal" class="form-input" placeholder="https://drive.google.com/...">
            <div class="form-help">Link Google Drive, OneDrive, dsb. (akses publik)</div>
          </div>

          <div id="wrap-file" style="display:none;">
            <input type="file" id="file" name="file" class="form-input" style="padding:6px;">
            <div class="form-help">Ukuran maksimum: 50 MB</div>
            <div id="current-file-info" style="margin-top:6px; font-size:0.8rem; color:#0ea5e9; display:none;">
              <i class="fas fa-file"></i> <span id="current-file-name"></span>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label class="form-label" for="urutan">Urutan Tampil</label>
          <input type="number" id="urutan" name="urutan" class="form-input" value="0" required>
          <div class="form-help">Angka kecil tampil lebih dulu</div>
        </div>

        <div class="form-group">
          <label class="form-label">
            <input type="checkbox" id="aktif" name="aktif" value="1" checked> Aktif (Tampilkan di halaman)
          </label>
        </div>

        <div style="margin-top:2rem; display:flex; justify-content:flex-end; gap:1rem">
          <button type="button" class="btn btn-outline" onclick="closeModal('modal-form')">Batal</button>
          <button type="submit" class="btn btn-primary">Simpan Data</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script>
function toggleSumber(val) {
    const wrapUrl  = document.getElementById('wrap-url-eksternal');
    const wrapFile = document.getElementById('wrap-file');
    if (val === 'file') {
        wrapUrl.style.display  = 'none';
        wrapFile.style.display = 'block';
        document.getElementById('url_eksternal').value = '';
    } else {
        wrapUrl.style.display  = 'block';
        wrapFile.style.display = 'none';
        document.getElementById('file').value = '';
    }
}

function openFormModal() {
    document.getElementById('modal-title').innerText   = 'Tambah File Download';
    document.getElementById('form-data').action        = '{{ route('admin.downloads.store') }}';
    document.getElementById('form-method').value       = 'POST';

    document.getElementById('judul').value             = '';
    document.getElementById('deskripsi').value         = '';
    document.getElementById('kategori').value          = '';
    document.getElementById('url_eksternal').value     = '';
    document.getElementById('file').value              = '';
    document.getElementById('urutan').value            = '0';
    document.getElementById('aktif').checked           = true;
    document.getElementById('sumber-link').checked     = true;
    document.getElementById('current-file-info').style.display = 'none';
    toggleSumber('link');

    window.openModal('modal-form');
}

function editData(data) {
    document.getElementById('modal-title').innerText   = 'Edit File Download';
    document.getElementById('form-data').action        = '/admin/downloads/' + data.id;
    document.getElementById('form-method').value       = 'PUT';

    document.getElementById('judul').value             = data.judul;
    document.getElementById('deskripsi').value         = data.deskripsi ?? '';
    document.getElementById('kategori').value          = data.kategori ?? '';
    document.getElementById('urutan').value            = data.urutan;
    document.getElementById('aktif').checked           = data.aktif ? true : false;

    if (data.file_path) {
        document.getElementById('sumber-file').checked  = true;
        document.getElementById('url_eksternal').value  = '';
        document.getElementById('current-file-info').style.display = 'block';
        document.getElementById('current-file-name').innerText = data.file_path.split('/').pop();
        toggleSumber('file');
    } else {
        document.getElementById('sumber-link').checked  = true;
        document.getElementById('url_eksternal').value  = data.url_eksternal ?? '';
        document.getElementById('current-file-info').style.display = 'none';
        toggleSumber('link');
    }

    window.openModal('modal-form');
}
</script>
@endpush
