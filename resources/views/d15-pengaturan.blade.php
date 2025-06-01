@extends('layout.mainDosen')

@section('container')

<h4 class="mb-3">Pengaturan KKM</h4>

@php
  $kkmSaatIni = auth()->user()->kkm ?? 70;
@endphp

<div class="mb-3">
  <p class="mb-1">Nilai KKM saat ini:</p>
  <h5><span class="badge bg-primary">{{ $kkmSaatIni }}</span></h5>
</div>

@if(session('success'))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif

<form action="{{ route('dosen.aturKKM') }}" method="POST" class="d-flex flex-wrap align-items-center gap-2">
  @csrf
  <label for="kkm" class="form-label mb-0">Ubah KKM:</label>
  <input type="number" name="kkm" id="kkm" value="{{ $kkmSaatIni }}" class="form-control" style="width: 100px;" min="0" max="100" required>
  <button type="submit" class="btn btn-success">Simpan</button>
</form>

@endsection
