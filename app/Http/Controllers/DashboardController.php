<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kkm;
use App\Models\Result;
use App\Models\RiwayatKuis;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Response;
// use Maatwebsite\Excel\Facades\Excel;
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

// public function dosen()
// {
//     $dosenId = Auth::id();

//     // Jumlah mahasiswa yang dibimbing oleh dosen ini
//     $jumlahMahasiswa = User::where('role', 'mahasiswa')
//         ->where('dosen_id', $dosenId)
//         ->count();

//     // Ambil semua nilai mahasiswa yang dibimbing dosen ini
//     $nilai = Result::whereIn('user_id', function ($query) use ($dosenId) {
//         $query->select('id')
//               ->from('users')
//               ->where('dosen_id', $dosenId);
//     })->get();

//     // Hitung rata-rata nilai
//     $totalNilai = 0;
//     $jumlah = 0;
//     foreach ($nilai as $n) {
//         if (!is_null($n->rata_rata)) {
//             $totalNilai += $n->rata_rata;
//             $jumlah++;
//         }
//     }

//     $rataNilai = $jumlah > 0 ? round($totalNilai / $jumlah, 2) : null;

//     return view('d11-dashboard', compact('jumlahMahasiswa', 'rataNilai'));
// }


public function dosen()
{
    $dosenId = Auth::id();

    // Ambil semua mahasiswa bimbingan
    $jumlahMahasiswa = User::where('role', 'mahasiswa')
        ->where('dosen_id', $dosenId)
        ->count();

    // Ambil seluruh hasil nilai
    $results = Result::whereIn('user_id', function ($query) use ($dosenId) {
        $query->select('id')
              ->from('users')
              ->where('dosen_id', $dosenId);
    })->get();

    // Inisialisasi array nilai per bidang
    $fields = ['kuis_1', 'kuis_2', 'kuis_3', 'kuis_4', 'kuis_5', 'evaluasi'];

    $totalNilaiKumulatif = 0;
    $jumlahMahasiswaDenganNilai = 0;

    $rataPerKuis = [];
    $nilaiTertinggi = [];
    $nilaiTerendah = [];
    $namaTertinggi = [];
    $namaTerendah = [];

    foreach ($fields as $field) {
        $nilaiField = $results->pluck($field)->filter(fn($v) => $v !== null);

        // Rata-rata, maksimum, minimum
        $rataPerKuis[$field] = $nilaiField->count() ? round($nilaiField->avg(), 2) : null;
        $nilaiTertinggi[$field] = $nilaiField->count() ? $nilaiField->max() : null;
        $nilaiTerendah[$field] = $nilaiField->count() ? $nilaiField->min() : null;

        // Nama-nama mahasiswa yang memiliki nilai tersebut
        $namaTertinggi[$field] = $results->filter(fn($r) => $r->$field == $nilaiTertinggi[$field])
            ->pluck('nama')
            ->toArray();

        $namaTerendah[$field] = $results->filter(fn($r) => $r->$field == $nilaiTerendah[$field])
            ->pluck('nama')
            ->toArray();
    }

    // Hitung nilai kumulatif dari rata_rata
    foreach ($results as $res) {
        if (!is_null($res->rata_rata)) {
            $totalNilaiKumulatif += $res->rata_rata;
            $jumlahMahasiswaDenganNilai++;
        }
    }

    $rataNilai = $jumlahMahasiswaDenganNilai > 0 
        ? round($totalNilaiKumulatif / $jumlahMahasiswaDenganNilai, 2)
        : null;

    return view('d11-dashboard', compact(
        'jumlahMahasiswa',
        'rataNilai',
        'rataPerKuis',
        'nilaiTertinggi',
        'nilaiTerendah',
        'namaTertinggi',
        'namaTerendah'
    ));
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
            $keyword = $request->cari;
            $query->where(function ($q) use ($keyword) {
                $q->where('name', 'like', "%{$keyword}%")
                  ->orWhere('nim', 'like', "%{$keyword}%")
                  ->orWhere('email', 'like', "%{$keyword}%");
            });
        }

        $mahasiswa = $query->paginate(5)->withQueryString(); 

        $totalHalaman = 25;
        foreach ($mahasiswa as $mhs) {
            $jumlahSelesai = \App\Models\ProgressMahasiswa::where('user_id', $mhs->id)->count();
            $mhs->progress_persen = round(($jumlahSelesai / $totalHalaman) * 100);
        }

        return view('d12-data-mahasiswa', compact('mahasiswa'));
    }



//     $topikMap = [
//     'b00-peta' => 'Peta Konsep',
//     'b11-object' => 'Object',
//     'b12-terminologi' => 'Terminologi',
//     'b13-membuatobject' => 'Membuat Object',
//     'b14-mengaksesp&m' => 'Mengakses Properties dan Methods',
//     'b17-hkuis' => 'Kuis 1',
//     'b21-mendeklarasikanm' => 'Mendeklarasikan Methods',
//     'b22-mendeklarasikanp' => 'Mendeklarasikan Properties',
//     'b23-mendeklarasikanc' => 'Mendeklarasikan Constants',
//     'b24-inheritance' => 'Inheritance',
//     'b25-interface' => 'Interfaces',
//     'b26-traits' => 'Traits',
//     'b27-abstractm' => 'Abstract Methods',
//     'b28-constructors' => 'Constructors',
//     'b29-destructor' => 'Destructors',
//     'b212-hkuis' => 'Kuis 2',
//     'b31-konsepd' => 'Konsep Dasar (Anonymous Class)',
//     'b34-hkuis' => 'Kuis 3',
//     'b41-memeriksac' => 'Memeriksa Classes',
//     'b42-memeriksao' => 'Memeriksa Object',
//     'b43-contohpi' => 'Contoh Program Introspection',
//     'b46-hkuis' => 'Kuis 4',
//     'b51-konsepd' => 'Konsep Dasar',
//     'b54-hkuis' => 'Kuis 5',
//     'b63-heval' => 'Evaluasi'
// ];

// foreach ($mahasiswa as $mhs) {
//     $jumlahSelesai = ProgressMahasiswa::where('user_id', $mhs->id)->count();
//     $mhs->progress_persen = round(($jumlahSelesai / $totalHalaman) * 100);

//     // Ambil entri terakhir mahasiswa dari tabel progres
//     $progressTerakhir = ProgressMahasiswa::where('user_id', $mhs->id)
//         ->orderByDesc('created_at')
//         ->first();

//     $halamanTerakhir = $progressTerakhir->halaman ?? '-';
//     $mhs->topik_terakhir = $topikMap[$halamanTerakhir] ?? $halamanTerakhir;
// }


//     return view('d12-data-mahasiswa', compact('mahasiswa'));
// }

public function detailTopik($id)
{
    // Validasi akses
    $mahasiswa = User::with('progressMahasiswas')->findOrFail($id);
    if ($mahasiswa->dosen_id !== Auth::id()) abort(403);

    // Daftar semua topik
    $topikMap = [
        'b00-peta' => 'Peta Konsep',
        'b11-object' => 'Object',
        'b12-terminologi' => 'Terminologi',
        'b13-membuatobject' => 'Membuat Object',
        'b14-mengaksesp&m' => 'Mengakses Properties dan Methods',
        'b17-hkuis' => 'Kuis 1',
        'b21-mendeklarasikanm' => 'Mendeklarasikan Methods',
        'b22-mendeklarasikanp' => 'Mendeklarasikan Properties',
        'b23-mendeklarasikanc' => 'Mendeklarasikan Constants',
        'b24-inheritance' => 'Inheritance',
        'b25-interface' => 'Interfaces',
        'b26-traits' => 'Traits',
        'b27-abstractm' => 'Abstract Methods',
        'b28-constructors' => 'Constructors',
        'b29-destructor' => 'Destructors',
        'b212-hkuis' => 'Kuis 2',
        'b31-konsepd' => 'Konsep Dasar (Anonymous Class)',
        'b34-hkuis' => 'Kuis 3',
        'b41-memeriksac' => 'Memeriksa Classes',
        'b42-memeriksao' => 'Memeriksa Object',
        'b43-contohpi' => 'Contoh Program Introspection',
        'b46-hkuis' => 'Kuis 4',
        'b51-konsepd' => 'Konsep Dasar (Serialization)',
        'b54-hkuis' => 'Kuis 5',
        'b63-heval' => 'Evaluasi'
    ];

    // Ambil semua halaman yang sudah diselesaikan user ini
    $halamanSelesai = $mahasiswa->progressMahasiswas
        ->where('selesai', 1)
        ->pluck('halaman')
        ->toArray();

    // Susun data hasil
    $result = collect($topikMap)->map(function($judul, $halaman) use ($halamanSelesai) {
        return [
            'judul' => $judul,
            'selesai' => in_array($halaman, $halamanSelesai)
        ];
    })->values();

    return response()->json([
        'nama' => $mahasiswa->name,
        'topik' => $result
    ]);
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


// public function updatePassword(Request $request, $id)
// {
//     $request->validate([
//         'newPassword' => 'required|min:8',
//     ]);

//     $mahasiswa = User::findOrFail($id);

//     // Cek apakah dosen yang login berhak mengedit password mahasiswa ini
//     if ($mahasiswa->dosen_id !== Auth::id()) {
//         abort(403, 'Tidak diizinkan mengedit password mahasiswa ini.');
//     }

//     $mahasiswa->password = bcrypt($request->newPassword);
//     $mahasiswa->save();

//     return redirect()->back()->with('success', 'Password mahasiswa berhasil diperbarui.');
// }

public function updateData(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'nim' => 'required|string|max:50',
        'email' => 'required|email|max:255',
        'password' => 'nullable|string|min:8|same:password_confirmation',
    ], [
        'password.same' => 'Password dan konfirmasi tidak cocok.',
    ]);

    $mahasiswa = User::findOrFail($id);

    if ($mahasiswa->dosen_id !== Auth::id()) {
        abort(403, 'Tidak diizinkan mengedit data mahasiswa ini.');
    }

    $updateData = [
        'name' => $request->name,
        'nim' => $request->nim,
        'email' => $request->email,
    ];

    if ($request->filled('password')) {
        $updateData['password'] = bcrypt($request->password);
    }

    $mahasiswa->update($updateData);

    return redirect()->back()->with('success', 'Data mahasiswa berhasil diperbarui.');
}


public function showDataNilai(Request $request)
{
    $tipeNilai = $request->get('tipe_nilai'); 

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
            //   ->orWhere('nilai', 'like', "%{$keyword}%");

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

    $select = [
        'id',
        'user_id',
        'nama',
        'email',
        'created_at',
        'updated_at',
    ];

    if ($tipeNilai) {
        $select[] = DB::raw("{$tipeNilai} as nilai_terakhir");
    } else {
        $select[] = DB::raw("NULL as nilai_terakhir");
    }

    $query->select($select);

    $nilai = $query->paginate(4)->withQueryString();

    return view('d13-data-nilai', compact('nilai', 'tipeNilai'));
}

public function detailNilai(Request $request, $id)
{
    $tipe = $request->get('tipe'); // kuis_1, kuis_2, evaluasi, dll
    $user = User::findOrFail($id);

    if (!$tipe) {
        return response()->json([
            'nama' => $user->name,
            'riwayat' => []
        ]);
    }

    // Ambil semua riwayat kuis dari tabel baru
    $riwayat = RiwayatKuis::where('user_id', $user->id)
        ->where('tipe_kuis', $tipe)
        ->orderBy('created_at', 'asc')
        ->get();

    $kkm = \App\Models\Kkm::where('dosen_id', $user->dosen_id)->value('kkm') ?? 70;

    $data = $riwayat->map(function ($item) use ($kkm) {
        return [
            'tanggal' => \Carbon\Carbon::parse($item->created_at)->translatedFormat('d F Y'),
            'waktu' => \Carbon\Carbon::parse($item->created_at)->translatedFormat('H:i') . ' WITA',
            'tipe' => strtoupper(str_replace('_', ' ', $item->tipe_kuis)),
            'benar' => $item->benar,
            'salah' => $item->salah,
            'skor' => $item->nilai,
            'tuntas' => intval($item->nilai) >= intval($kkm)
        ];
    });

    return response()->json([
        'nama' => $user->name,
        'riwayat' => $data
    ]);
}




// public function showDataNilai(Request $request)
// {
//     $query = Result::whereIn('user_id', function ($q) {
//         $q->select('id')
//           ->from('users')
//           ->where('dosen_id', Auth::id());
//     });

//     if ($request->has('cari')) {
//         $keyword = $request->cari;

//         $query->where(function ($q) use ($keyword) {
//             $q->where('nama', 'like', "%{$keyword}%")
//               ->orWhere('email', 'like', "%{$keyword}%");

//             // Tambahkan pencarian angka (nilai)
//             if (is_numeric($keyword)) {
//                 $q->orWhere('kuis_1', $keyword)
//                   ->orWhere('kuis_2', $keyword)
//                   ->orWhere('kuis_3', $keyword)
//                   ->orWhere('kuis_4', $keyword)
//                   ->orWhere('kuis_5', $keyword)
//                   ->orWhere('evaluasi', $keyword)
//                   ->orWhere('rata_rata', $keyword);
//             }
//         });

//         $tipeNilai = $request->get('tipe_nilai', 'evaluasi'); // default evaluasi

//         $nilai = Result::whereIn('user_id', function ($q) {
//             $q->select('id')->from('users')->where('dosen_id', Auth::id());
//         })
//         ->select('id', 'user_id', 'nama', 'email', 'jawaban_json', 'created_at', 'updated_at', $tipeNilai . ' as nilai_terakhir')
//         ->paginate(10);

//     }

//     $nilai = $query->paginate(4)->withQueryString();

//     return view('d13-data-nilai', compact('nilai'));
// }



public function aturKKM(Request $request)
{
    $request->validate([
        'kkm' => 'required|integer|min:0|max:100'
    ]);

    $dosenId = auth()->id();

    // Update jika sudah ada, atau buat baru jika belum ada
    Kkm::updateOrCreate(
        ['dosen_id' => $dosenId], // syarat pencarian
        ['kkm' => $request->kkm]  // data yang akan disimpan
    );

    return back()->with('success', 'KKM berhasil diperbarui.');
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

public function exportNilaiCSV()
{
    $dosen = Auth::user();
    $results = Result::whereIn('user_id', function ($query) {
        $query->select('id')->from('users')->where('dosen_id', Auth::id());
    })->get();

    $filename = 'Laporan_Nilai_Mahasiswa.csv';
    $handle = fopen('php://temp', 'r+');

    // Baris Judul
    fputcsv($handle, ['Laporan Nilai Mahasiswa']);
    fputcsv($handle, []);
    fputcsv($handle, ['Nama Dosen:', $dosen->name ?? '-']);
    fputcsv($handle, ['Email Dosen:', $dosen->email ?? '-']);
    fputcsv($handle, ['Token Kelas:', $dosen->token ?? '-']);
    fputcsv($handle, []); // Spasi

    // Header tabel
    $header = ['Nama', 'Email', 'Kuis 1', 'Kuis 2', 'Kuis 3', 'Kuis 4', 'Kuis 5', 'Evaluasi', 'Rata-rata'];
    fputcsv($handle, $header);

    foreach ($results as $item) {
        fputcsv($handle, [
            $item->nama,
            $item->email,
            $item->kuis_1 ?? '-',
            $item->kuis_2 ?? '-',
            $item->kuis_3 ?? '-',
            $item->kuis_4 ?? '-',
            $item->kuis_5 ?? '-',
            $item->evaluasi ?? '-',
            $item->rata_rata ?? '-',
        ]);
    }

    rewind($handle);
    $content = stream_get_contents($handle);
    fclose($handle);

    return response($content, 200, [
        'Content-Type' => 'text/csv',
        'Content-Disposition' => "attachment; filename=$filename",
    ]);
}


// public function exportNilaiExcel()
// {
//     return Excel::download(new NilaiExport, 'Laporan_Nilai_Mahasiswa.xlsx');
// }
   
}

