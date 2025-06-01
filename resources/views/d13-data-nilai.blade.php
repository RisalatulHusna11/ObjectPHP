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

</style>

<h2 class="section-title">Data Nilai</h2>

<div class="table-actions">
  <form action="{{ route('dashboard.showDataNilai') }}" method="GET" class="search-form">
    <input type="text" name="cari" value="{{ request('cari') }}" placeholder="Cari" class="search-input">
    <button type="submit" class="search-btn"><i class="bi bi-search"></i></button>
  </form>
  <div style="display: flex; gap: 8px;">
    <a href="{{ route('nilai.exportPdf') }}" class="btn-export"><i class="bi bi-file-earmark-pdf"></i> Export</a>  </div>
</div>

<div class="table-wrapper">
  <div class="table-container">
    <div class="table-scrollable">
      <table>
        <thead>
          <tr>
            <th>Nama</th>
            <th>Email</th>
            <th>Kuis 1</th>
            <th>Kuis 2</th>
            <th>Kuis 3</th>
            <th>Kuis 4</th>
            <th>Kuis 5</th>
            <th>Evaluasi</th>
            <th>Rata-rata</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($nilai as $item)
          <tr>
            <td>
              <div class="d-flex align-items-center">
                <div class="avatar-initial">{{ strtoupper(substr($item->nama, 0, 1)) }}</div>
                {{ $item->nama }}
              </div>
            </td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->kuis_1 ?? '-' }}</td>
            <td>{{ $item->kuis_2 ?? '-' }}</td>
            <td>{{ $item->kuis_3 ?? '-' }}</td>
            <td>{{ $item->kuis_4 ?? '-' }}</td>
            <td>{{ $item->kuis_5 ?? '-' }}</td>
            <td>{{ $item->evaluasi ?? '-' }}</td>
            <td>{{ number_format($item->rata_rata, 2) }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

<div class="pagination-wrapper">
  {{ $nilai->links('vendor.pagination.nextphp') }}
</div>

@endsection
