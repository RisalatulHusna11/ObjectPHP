@extends('layout.mainDosen')

@section('container')

<style>
  .section-title {
    font-size: 1.6rem;
    font-weight: 700;
    margin-bottom: 25px;
    color: #6f42c1;
  }

  .table-wrapper {
    overflow-x: auto;
  }

  .table-container {
    min-width: 100%;
    background: #fff;
    border-radius: 12px;
    padding: 15px 20px;
    box-shadow: 0 2px 12px rgba(0, 0, 0, 0.05);
    font-size: 0.85rem;
  }

  table {
    width: 100%;
    border-collapse: collapse;
    font-size: 0.85rem;
  }

  th {
    background-color: #f2eaff;
    color: #6f42c1;
    padding: 8px 10px;
    text-align: left;
    white-space: nowrap;
  }

  td {
    padding: 8px 10px;
    border-bottom: 1px solid #eee;
    white-space: nowrap;
  }

  .btn-delete {
    background-color: #f87171;
    color: white;
    border: none;
    padding: 4px 8px;
    border-radius: 5px;
    font-size: 0.75rem;
  }

  .btn-delete:hover {
    background-color: #dc2626;
  }

  .btn-edit {
    background-color: #60a5fa;
    color: white;
    border: none;
    padding: 4px 8px;
    border-radius: 5px;
    font-size: 0.75rem;
  }

  .btn-edit:hover {
    background-color: #3b82f6;
  }

  .avatar-initial {
    width: 28px;
    height: 28px;
    border-radius: 50%;
    background-color: #dcd2f5;
    color: #6f42c1;
    font-weight: bold;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    margin-right: 6px;
    font-size: 0.85rem;
  }

  .data-row:hover {
    background-color: #f9f6ff;
  }

  .pagination-wrapper {
    display: flex;
    justify-content: center;
    margin-top: 15px;
  }

  .pagination-custom {
    list-style: none;
    padding: 0;
    display: flex;
    gap: 6px;
  }

  .pagination-custom a,
  .pagination-custom span {
    padding: 6px 12px;
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

  .table-actions {
    display: flex;
    justify-content: flex-start;
    margin-bottom: 15px;
    gap: 8px;
    flex-wrap: wrap;
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
    font-size: 0.85rem;
    width: 230px;
  }

  .search-btn {
    background-color: #6f42c1;
    color: white;
    border: none;
    padding: 8px 14px;
    border-radius: 8px;
    cursor: pointer;
  }

  .search-btn:hover {
    background-color: #5a32a3;
  }

  @media (max-width: 768px) {
    .search-input {
      width: 100%;
    }

    table {
      font-size: 0.8rem;
    }

    .table-container {
      padding: 12px;
    }
  }
</style>

@if(session('success'))
<div id="popup-success" class="alert alert-success popup-center shadow">
  {{ session('success') }}
</div>
@endif

@if($errors->any())
<div id="popup-error" class="alert alert-danger popup-center shadow">
  <ul class="mb-0">
    @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif

<h2 class="section-title">Data Mahasiswa</h2>
<div class="table-actions">
  <form action="{{ route('dashboard.showDataMahasiswa') }}" method="GET" class="search-form">
    <input type="text" name="cari" value="{{ request('cari') }}" placeholder="Cari..." class="search-input">
    <button type="submit" class="search-btn"><i class="bi bi-search"></i></button>
  </form>
</div>

<div class="table-wrapper">
  <div class="table-container">
    <table>
      <thead>
        <tr>
          <th>NO</th>
          <th>Nama</th>
          <th>NIM</th>
          <th>Email</th>
          <th>Progres</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($mahasiswa as $index => $mhs)
        <tr class="data-row">
          <td>{{ $mahasiswa->firstItem() + $index }}</td>
          <td>
            <div class="d-flex align-items-center">
              <div class="avatar-initial">{{ strtoupper(substr($mhs->name, 0, 1)) }}</div>
              {{ $mhs->name }}
            </div>
          </td>
          <td>{{ $mhs->nim }}</td>
          <td>{{ $mhs->email }}</td>
          <td>
            <div class="progress" style="height: 14px;">
              <div class="progress-bar" role="progressbar"
                  style="width: {{ $mhs->progress_persen }}%; background-color: #8A56DC !important; font-size: 0.75rem;"
                  aria-valuenow="{{ $mhs->progress_persen }}" aria-valuemin="0" aria-valuemax="100">
                {{ $mhs->progress_persen }}%
              </div>
            </div>
          </td>

          <td class="d-flex" style="gap: 8px;">
            <button class="btn btn-sm btn-outline-primary btn-detail" data-id="{{ $mhs->id }}">
              <i class="bi bi-eye"></i>
            </button>
            <button class="btn-edit" data-bs-toggle="modal" data-bs-target="#editDataModal{{ $mhs->id }}">
              <i class="bi bi-pencil-square"></i>
            </button>

            <form action="{{ route('mahasiswa.destroy', $mhs->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
              @csrf
              @method('DELETE')
              <button class="btn-delete" type="submit"><i class="bi bi-trash"></i></button>
            </form>
          </td>
        </tr>

        <div class="modal fade" id="editDataModal{{ $mhs->id }}" tabindex="-1" aria-labelledby="editDataModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <form method="POST" action="{{ route('mahasiswa.updateData', $mhs->id) }}">
              @csrf
              @method('PUT')
              <input type="hidden" name="id_modal" value="{{ $mhs->id }}">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Edit Data Mahasiswa - {{ $mhs->name }}</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" class="form-control" name="name" value="{{ $mhs->name }}" required>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">NIM</label>
                    <input type="text" class="form-control" name="nim" value="{{ $mhs->nim }}" required>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" value="{{ $mhs->email }}" required>
                  </div>

                  <hr>
                  <h6>Ganti Password</h6>
                  <div class="mb-3">
                    <label class="form-label">Password Baru</label>
                    <input type="password" class="form-control password-input" name="password" minlength="8">
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Konfirmasi Password</label>
                    <input type="password" class="form-control password-input" name="password_confirmation" minlength="8">
                  </div>
                  <div class="form-check">
                    <input class="form-check-input toggle-password" type="checkbox" onclick="togglePassword({{ $mhs->id }})">
                    <label class="form-check-label">
                      Tampilkan Password
                    </label>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                </div>
              </div>
            </form>
          </div>
        </div>
        @endforeach
        <!-- Modal Detail Topik -->
<div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="detailModalLabel">Detail Progres Topik - <span id="detailNama"></span></h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <ul class="list-group" id="detailTopikList">
          <li class="list-group-item text-center text-muted">Memuat data...</li>
        </ul>
      </div>
    </div>
  </div>
</div>

      </tbody>
    </table>

    <div class="pagination-wrapper">
      {{ $mahasiswa->links('vendor.pagination.nextphp') }}
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
  function togglePassword(id) {
    const pass = document.querySelector(`#editDataModal${id} input[name='password']`);
    const confirm = document.querySelector(`#editDataModal${id} input[name='password_confirmation']`);
    const type = pass.type === 'password' ? 'text' : 'password';
    pass.type = type;
    confirm.type = type;
  }

  setTimeout(() => {
    const popupSuccess = document.getElementById('popup-success');
    if (popupSuccess) popupSuccess.style.display = 'none';

    const popupError = document.getElementById('popup-error');
    if (popupError) popupError.style.display = 'none';
  }, 3000);

  @if ($errors->any())
    const failedId = "{{ old('id_modal') }}";
    if (failedId) {
      const modal = new bootstrap.Modal(document.getElementById('editDataModal' + failedId));
      modal.show();
    }
  @endif

  $(function () {
  $('.btn-detail').on('click', function () {
    const userId = $(this).data('id');
    const modal = new bootstrap.Modal(document.getElementById('detailModal'));

    $('#detailNama').text('Memuat...');
    $('#detailTopikList').html('<li class="list-group-item text-center text-muted">Memuat data...</li>');

    $.get(`/mahasiswa/${userId}/detail-topik`, function (res) {
      $('#detailNama').text(res.nama);
      const $ul = $('#detailTopikList').empty();

      if (!res.topik || res.topik.length === 0) {
        $ul.append(`<li class="list-group-item text-muted">Belum ada topik tersedia</li>`);
      } else {
        res.topik.forEach(item => {
          const icon = item.selesai
            ? '<i class="bi bi-check-circle-fill text-success"></i>'
            : '<i class="bi bi-x-circle-fill text-danger"></i>';
          $ul.append(`
            <li class="list-group-item d-flex justify-content-between align-items-center">
              ${item.judul}
              <span>${icon}</span>
            </li>
          `);
        });
      }

      modal.show();
    }).fail(function () {
      $('#detailNama').text('Gagal Memuat');
      $('#detailTopikList').html('<li class="list-group-item text-danger">Terjadi kesalahan saat memuat data.</li>');
      modal.show();
    });
  });
});

</script>
@endsection
