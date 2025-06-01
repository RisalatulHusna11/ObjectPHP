<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Barang;
use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\NilaiExport;
use App\Models\ProgressMahasiswa;


class DashboardController extends Controller
{
    public function index()
    {     
        return view('dashboard');
    }

    public function dosend()
{
    $mahasiswa = User::where('dosen_id', Auth::id())->get();
    return view('dashboard.dosen', compact('mahasiswa'));
}

public function dosen()
{
    $dosenId = Auth::id();

    // Jumlah mahasiswa yang dibimbing oleh dosen ini
    $jumlahMahasiswa = User::where('role', 'mahasiswa')
        ->where('dosen_id', $dosenId)
        ->count();

    // Ambil semua nilai mahasiswa yang dibimbing dosen ini
    $nilai = Result::whereIn('user_id', function ($query) use ($dosenId) {
        $query->select('id')
              ->from('users')
              ->where('dosen_id', $dosenId);
    })->get();

    // Hitung rata-rata nilai
    $totalNilai = 0;
    $jumlah = 0;
    foreach ($nilai as $n) {
        if (!is_null($n->rata_rata)) {
            $totalNilai += $n->rata_rata;
            $jumlah++;
        }
    }

    $rataNilai = $jumlah > 0 ? round($totalNilai / $jumlah, 2) : null;

    return view('d11-dashboard', compact('jumlahMahasiswa', 'rataNilai'));
}

public function mahasiswa()
{
    // Ambil semua mahasiswa dengan dosen_id sesuai user yang login
    $mahasiswa = User::where('dosen_id', Auth::user()->dosen_id)->get();
    return view('dashboard.mahasiswa', compact('mahasiswa'));
}

public function showDataMahasiswa(Request $request)
{
    $query = User::where('role', 'mahasiswa')
                 ->where('dosen_id', Auth::id()); 

    if ($request->has('cari')) {
        $query->where('name', 'like', '%' . $request->cari . '%');
    }

    $mahasiswa = $query->paginate(5)->withQueryString(); 

    $totalHalaman = 25;
    foreach ($mahasiswa as $mhs) {
        $jumlahSelesai = \App\Models\ProgressMahasiswa::where('user_id', $mhs->id)->count();
        $mhs->progress_persen = round(($jumlahSelesai / $totalHalaman) * 100);
    }

    return view('d12-data-mahasiswa', compact('mahasiswa'));
}


public function destroyMahasiswa($id)
{
    $mahasiswa = User::findOrFail($id);

    if ($mahasiswa->dosen_id !== Auth::id()) {
        abort(403, 'Tidak diizinkan menghapus mahasiswa ini.');
    }

    $mahasiswa->delete();
    return back()->with('success', 'Data mahasiswa berhasil dihapus.');
}


public function updatePassword(Request $request, $id)
{
    $request->validate([
        'newPassword' => 'required|min:8',
    ]);

    $mahasiswa = User::findOrFail($id);

    // Cek apakah dosen yang login berhak mengedit password mahasiswa ini
    if ($mahasiswa->dosen_id !== Auth::id()) {
        abort(403, 'Tidak diizinkan mengedit password mahasiswa ini.');
    }

    $mahasiswa->password = bcrypt($request->newPassword);
    $mahasiswa->save();

    return redirect()->back()->with('success', 'Password mahasiswa berhasil diperbarui.');
}

public function showDataNilai(Request $request)
{
    $query = Result::whereIn('user_id', function ($q) {
        $q->select('id')
          ->from('users')
          ->where('dosen_id', Auth::id());
    });

    if ($request->has('cari')) {
        $keyword = $request->cari;

        $query->where(function ($q) use ($keyword) {
            $q->where('nama', 'like', "%{$keyword}%")
              ->orWhere('email', 'like', "%{$keyword}%");

            // Tambahkan pencarian angka (nilai)
            if (is_numeric($keyword)) {
                $q->orWhere('kuis_1', $keyword)
                  ->orWhere('kuis_2', $keyword)
                  ->orWhere('kuis_3', $keyword)
                  ->orWhere('kuis_4', $keyword)
                  ->orWhere('kuis_5', $keyword)
                  ->orWhere('evaluasi', $keyword)
                  ->orWhere('rata_rata', $keyword);
            }
        });
    }

    $nilai = $query->paginate(4)->withQueryString();

    return view('d13-data-nilai', compact('nilai'));
}



public function aturKKM(Request $request)
{
    $request->validate([
        'kkm' => 'required|integer|min:0|max:100'
    ]);

    $dosen = Auth::user();
    $kkmBaru = $request->kkm;

    // Simpan ke dosen
    $dosen->kkm = $kkmBaru;
    $dosen->save();

    // Update seluruh mahasiswa yang memiliki dosen_id ini
    \App\Models\User::where('role', 'mahasiswa')
        ->where('dosen_id', $dosen->id)
        ->update(['kkm' => $kkmBaru]);

    return back()->with('success', 'KKM berhasil diperbarui untuk Anda dan seluruh mahasiswa Anda.');
}

public function exportNilaiPDF()
{
    $dosen = Auth::user();
    $nilai = Result::whereIn('user_id', function ($query) {
        $query->select('id')->from('users')->where('dosen_id', Auth::id());
    })->get();

    $pdf = Pdf::loadView('exports.nilai_pdf', compact('nilai', 'dosen'));
    return $pdf->download('Laporan_Nilai_Mahasiswa.pdf');
}

// public function exportNilaiExcel()
// {
//     return Excel::download(new NilaiExport, 'Laporan_Nilai_Mahasiswa.xlsx');
// }
   
}
