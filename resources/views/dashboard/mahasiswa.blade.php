@extends('layout.mainDashboardM')

@section('container')

<section id="home" class="grid-container1">
        <div class="textBox" >
            <h2>MEDIA PEMBELAJARAN INTERAKTIF</h2>
            <h2 style="font-size: 28px;">OBJECT-ORIENTED PROGRAMMING PHP</h2>
            <h5>
                Sebagai mahasiswa, Anda dapat mengakses seluruh materi OOP PHP, menyelesaikan latihan interaktif, mengikuti kuis dan evaluasi, serta memantau progres belajar secara otomatis. Setiap hasil penyelesaian kuis dan evaluasi akan disimpan ke halaman dosenmu untuk menentukan pencapaian Kriteria Ketuntasan Minimal (KKM).
            </h5>
            <a class="btn btn-success" href="/b00-peta">Mulai Belajar >></a>
        </div>
        <div class="gambar">
            <img class="scrool" src="{{ asset('images/mahasiswa.png') }}" alt="Gambar Awal">
        </div>
    </section>   
@endsection