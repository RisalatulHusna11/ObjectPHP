@extends('layout.mainDashboardD')

@section('container')

<section id="home" class="grid-container1">
        <div class="textBox" >
            <h2>MEDIA PEMBELAJARAN INTERAKTIF</h2>
            <h2 style="font-size: 28px;">OBJECT-ORIENTED PROGRAMMING PHP</h2>
            <h5>
                Halaman ini dirancang khusus untuk dosen, Anda dapat memantau perkembangan belajar mahasiswa bimbingan Anda, melihat hasil kuis dan evaluasi mereka, mengatur Kriteria Ketuntasan Minimal (KKM) untuk semua kuis dan evaluasi, serta mengakses halaman materi.
            </h5>
            <a class="btn btn-success" href="/d11-dashboard">Halaman Dosen >></a>
        </div>
        <div class="gambar">
            <img class="scrool" src="{{ asset('images/dosen.png') }}" alt="Gambar Awal">
        </div>
    </section>   
@endsection