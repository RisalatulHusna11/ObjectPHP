@extends('layout.mainDosen')

@section('container')

<style>

  .table-scrollable {
  width: 100%;
  overflow-x: auto;
}

  .section-title {
    font-size: 1.8rem;
    font-weight: 700;
    margin-bottom: 30px;
    color: #6f42c1;
  }

  .table-wrapper {
    overflow-x: auto;
  }

  .table-container {
    min-width: 1000px;
    background: #fff;
    border-radius: 12px;
    padding: 25px;
    box-shadow: 0 2px 12px rgba(0, 0, 0, 0.05);
  }

  table {
    width: 100%;
    border-collapse: collapse;
    font-size: 0.95rem;
  }

  th {
    background-color: #f2eaff;
    color: #6f42c1;
    padding: 12px;
    text-align: left;
    white-space: nowrap;
  }

  td {
    padding: 10px 12px;
    border-bottom: 1px solid #eee;
    white-space: nowrap;
  }

  .avatar-initial {
    width: 35px;
    height: 35px;
    border-radius: 50%;
    background-color: #dcd2f5;
    color: #6f42c1;
    font-weight: bold;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    margin-right: 10px;
  }

  .btn-export {
    background-color: #22c55e;
    color: white;
    border: none;
    padding: 8px 16px;
    border-radius: 6px;
    font-weight: 500;
    text-decoration: none;
  }

  .btn-export:hover {
    background-color: #16a34a;
  }

.pagination-wrapper {
  display: flex;
  justify-content: center;
  margin-top: 20px;
}

.pagination-custom {
  list-style: none;
  padding: 0;
  display: flex;
  gap: 8px;
}

.pagination-custom li {
  display: inline;
}

.pagination-custom a,
.pagination-custom span {
  padding: 8px 14px;
  border-radius: 6px;
  background-color: #f3e8ff;
  color: #6f42c1;
  text-decoration: none;
  font-weight: 600;
  transition: 0.2s;
}

.pagination-custom a:hover {
  background-color: #e9d5ff;
}

.pagination-custom .active span {
  background-color: #6f42c1;
  color: #fff;
}

.pagination-custom .disabled span {
  background-color: #eee;
  color: #aaa;
  cursor: not-allowed;
}

/* SEARCH */
.table-actions {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 15px;
  flex-wrap: wrap;
  gap: 10px;
}

.search-form {
  display: flex;
  gap: 8px;
}

.search-input {
  padding: 8px 12px;
  border: 2px solid #d6bcfa;
  border-radius: 8px;
  outline: none;
  font-size: 0.95rem;
  width: 250px;
  transition: 0.3s ease;
}

.search-input:focus {
  border-color: #6f42c1;
  box-shadow: 0 0 0 3px #ede9fe;
}

.search-btn {
  background-color: #6f42c1;
  color: white;
  border: none;
  padding: 8px 14px;
  border-radius: 8px;
  cursor: pointer;
  transition: 0.3s ease;
}

.search-btn:hover {
  background-color: #5a32a3;
}

.btn-edit {
  background-color: #60a5fa;
  color: white;
  border: none;
  padding: 4px 8px;
  border-radius: 5px;
  font-size: 0.75rem;
}

@media (max-width: 768px) {
  .search-form {
    flex-direction: column;
    align-items: stretch;
  }

  .search-input, .search-btn, .btn-export {
    width: 100%;
    box-sizing: border-box;
  }

  .table-container {
    min-width: unset;
    padding: 15px;
  }

  .modal-dialog {
    width: 95% !important;
    margin: 1rem auto;
  }

  .modal-body {
    padding: 0.5rem;
  }

  .modal-body table {
    font-size: 0.85rem;
    display: block;
    overflow-x: auto;
    white-space: nowrap;
  }

  .modal-body th,
  .modal-body td {
    padding: 6px 10px;
  }
}


</style>

<h2 class="section-title">Data Nilai</h2>

<div class="table-actions">
  <form action="{{ route('dashboard.showDataNilai') }}" method="GET" class="search-form">
    <select name="tipe_nilai" class="search-input" onchange="this.form.submit()">
      <option value="" disabled {{ request('tipe_nilai') == '' ? 'selected' : '' }}>--- Pilih Nilai ---</option>
      <option value="kuis_1" {{ request('tipe_nilai') == 'kuis_1' ? 'selected' : '' }}>Kuis 1</option>
      <option value="kuis_2" {{ request('tipe_nilai') == 'kuis_2' ? 'selected' : '' }}>Kuis 2</option>
      <option value="kuis_3" {{ request('tipe_nilai') == 'kuis_3' ? 'selected' : '' }}>Kuis 3</option>
      <option value="kuis_4" {{ request('tipe_nilai') == 'kuis_4' ? 'selected' : '' }}>Kuis 4</option>
      <option value="kuis_5" {{ request('tipe_nilai') == 'kuis_5' ? 'selected' : '' }}>Kuis 5</option>
      <option value="evaluasi" {{ request('tipe_nilai') == 'evaluasi' ? 'selected' : '' }}>Evaluasi</option>
      <option value="rata_rata" {{ request('tipe_nilai') == 'rata_rata' ? 'selected' : '' }}>Rata-rata</option>
    </select>

    <input type="text" name="cari" value="{{ request('cari') }}" placeholder="Cari..." class="search-input">
    <button type="submit" class="search-btn"><i class="bi bi-search"></i></button>
  </form>
  <a href="{{ route('nilai.exportPdf') }}" class="btn-export">
    <i class="bi bi-file-earmark-pdf"></i> Export PDF
  </a>
  <a href="{{ route('nilai.exportCsv') }}" class="btn-export">
  <i class="bi bi-filetype-csv"></i> Export CSV
</a>

</div>

<div class="table-wrapper">
  <div class="table-container">
    <div class="table-scrollable">
      <table>
        <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Nilai Terakhir</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($nilai as $index => $item)
          <tr>
            <td>{{ $nilai->firstItem() + $index }}</td>
            <td>{{ $item->nama }}</td>
            <td>{{ $item->email }}</td>
            <td>
              @if($item->nilai_terakhir === null)
                -
              @else
                {{ is_numeric($item->nilai_terakhir) ? $item->nilai_terakhir : '-' }}
              @endif
            </td>
            <td>
              <a href="javascript:void(0)" 
                class="btn btn-sm btn-outline-primary btn-detail-nilai" 
                data-id="{{ $item->user_id }}" 
                data-tipe="{{ request('tipe_nilai') }}">
                <i class="bi bi-eye"></i>
              </a>



            </td>
          </tr>
          @empty
          <tr>
            <td colspan="5" class="text-center">Tidak ada data nilai.</td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>

<div class="pagination-wrapper">
  {{ $nilai->appends(request()->all())->links('vendor.pagination.nextphp') }}
</div>

<!-- Modal -->
<div class="modal fade" id="modalDetailNilai" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title">Riwayat Nilai Mahasiswa - <span id="namaMahasiswa"></span></h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered">
          <thead class="table-light">
            <tr>
              <th>No.</th>
              <th>Tanggal</th>
              <th>Waktu</th>
              <th>Kuis</th>
              <th>Jawaban Benar</th>
              <th>Jawaban Salah</th>
              <th>Nilai</th>
              <th>Tuntas</th>
            </tr>
          </thead>
          <tbody id="isiDetailNilai">
            <tr><td colspan="7" class="text-center text-muted">Memuat data...</td></tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $('.btn-detail-nilai').click(function () {
  const userId = $(this).data('id');
  const tipe = $(this).data('tipe');

  $('#modalDetailNilai').modal('show');
  $('#isiDetailNilai').html('<tr><td colspan="7" class="text-center">Memuat data...</td></tr>');

  $.get(`/nilai/${userId}/detail?tipe=${tipe}`, function (res) {
    $('#namaMahasiswa').text(res.nama);
    let html = '';

    if (res.riwayat.length === 0) {
      html = '<tr><td colspan="7" class="text-center">Belum ada data nilai.</td></tr>';
    } else {
      res.riwayat.forEach((d, i) => {
        html += `
          <tr>
            <td>${i + 1}</td>
            <td>${d.tanggal}</td>
            <td>${d.waktu}</td>
            <td>${d.tipe}</td>
            <td>${d.benar}</td>
            <td>${d.salah}</td>
            <td>${d.skor}</td>
            <td>${d.tuntas ? 'Ya' : 'Tidak'}</td>
          </tr>
        `;
      });
    }

    $('#isiDetailNilai').html(html);
  }).fail(function () {
    $('#isiDetailNilai').html('<tr><td colspan="7" class="text-danger text-center">Gagal memuat data.</td></tr>');
  });
});

</script>

@endsection
