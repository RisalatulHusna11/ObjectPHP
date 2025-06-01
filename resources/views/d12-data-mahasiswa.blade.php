@extends('layout.mainDosen')

@section('container')

<style>
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
    min-width: 900px;
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

  .btn-delete {
    background-color: #f87171;
    color: white;
    border: none;
    padding: 6px 12px;
    border-radius: 6px;
    font-size: 0.85rem;
    margin-right: 5px;
  }

  .btn-delete:hover {
    background-color: #dc2626;
  }

  .btn-edit {
    background-color: #60a5fa;
    color: white;
    border: none;
    padding: 6px 12px;
    border-radius: 6px;
    font-size: 0.85rem;
  }

  .btn-edit:hover {
    background-color: #3b82f6;
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

  .data-row:hover {
    background-color: #f9f6ff;
  }

  .modal-backdrop {
    z-index: 0;
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


.table-actions {
  display: flex;
  justify-content: flex-start;
  margin-bottom: 20px;
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


</style>

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
          <th>Progress</th>
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
          <td style="min-width: 130px;">
            <div class="progress" style="height: 18px;">
              <div class="progress-bar" role="progressbar"
                  style="width: {{ $mhs->progress_persen }}%; background-color: #8A56DC !important;"
                  aria-valuenow="{{ $mhs->progress_persen }}" aria-valuemin="0" aria-valuemax="100">
                {{ $mhs->progress_persen }}%
              </div>
            </div>
          </td>
          <td class="d-flex" style= "gap : 10px;" >
            {{-- Tombol Edit Password --}}
            <button class="btn-edit" data-bs-toggle="modal" data-bs-target="#editPasswordModal{{ $mhs->id }}">
              <i class="bi bi-pencil"></i>
            </button>

            {{-- Tombol Hapus --}}
            <form action="{{ route('mahasiswa.destroy', $mhs->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
              @csrf
              @method('DELETE')
              <button class="btn-delete" type="submit"><i class="bi bi-trash"></i></button>
            </form>
          </td>
        </tr>

        {{-- MODAL Edit Password --}}
        <div class="modal fade" id="editPasswordModal{{ $mhs->id }}" tabindex="-1" aria-labelledby="editPasswordModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <form method="POST" action="{{ route('mahasiswa.updatePassword', $mhs->id) }}">
              @csrf
              @method('PUT')
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="editPasswordModalLabel">Edit Password - {{ $mhs->name }}</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <label for="newPassword{{ $mhs->id }}" class="form-label">Password Baru</label>
                  <div class="input-group">
                    <input type="password" class="form-control" name="newPassword" id="newPassword{{ $mhs->id }}" required>
                    <span class="input-group-text toggle-password" style="cursor: pointer;" data-target="newPassword{{ $mhs->id }}">
                      <i class="bi bi-eye-slash"></i>
                    </span>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
              </div>
            </form>
          </div>
        </div>
        @endforeach
      </tbody>
    </table>
<div class="pagination-wrapper">
  {{ $mahasiswa->links('vendor.pagination.nextphp') }}
</div>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.toggle-password').forEach(function (el) {
      el.addEventListener('click', function () {
        const targetId = this.getAttribute('data-target');
        const input = document.getElementById(targetId);
        const icon = this.querySelector('i');

        if (input.type === 'password') {
          input.type = 'text';
          icon.classList.remove('bi-eye-slash');
          icon.classList.add('bi-eye');
        } else {
          input.type = 'password';
          icon.classList.remove('bi-eye');
          icon.classList.add('bi-eye-slash');
        }
      });
    });
  });
</script>

@endsection
