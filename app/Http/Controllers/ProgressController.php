<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProgressMahasiswa;
use Illuminate\Support\Facades\Auth;

class ProgressController extends Controller
{
    public function simpan(Request $request)
    {
        $user = Auth::user();

        // Cek validasi halaman (optional)
        if (!$request->halaman) {
            return response()->json(['status' => 'invalid', 'message' => 'Halaman tidak boleh kosong'], 400);
        }

        // Simpan atau update progress
        ProgressMahasiswa::updateOrCreate(
            ['user_id' => $user->id, 'halaman' => $request->halaman],
            ['selesai' => true]
        );

        return response()->json(['status' => 'ok']);
    }


public function getProgressPercentage()
{
    // <!-- Total halaman materi yang tersedia -->
    $totalHalaman = 25; 

    // <!-- Ambil ID pengguna yang sedang login -->
    $userId = auth()->id();

    // <!-- Hitung jumlah halaman yang telah diselesaikan oleh pengguna -->
    $selesai = ProgressMahasiswa::where('user_id', $userId)->count();

    // <!-- Hitung persentase progres pembelajaran -->
    $progressPercentage = round(($selesai / $totalHalaman) * 100);

    // <!-- Kembalikan persentase dalam format JSON untuk ditampilkan di frontend -->
    return response()->json(['progress' => $progressPercentage]);
}


    public function cek(Request $request)
{
    $userId = auth()->id();
    $halaman = $request->input('halaman', []); // array halaman yang dicek

    $selesai = ProgressMahasiswa::where('user_id', $userId)
                ->whereIn('halaman', $halaman)
                ->pluck('halaman')
                ->toArray();

    return response()->json(['selesai' => $selesai]);
}

}


