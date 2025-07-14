<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Result;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EditorController;
use App\Http\Controllers\ProgressController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// HANYA BISA DIAKSES DOSEN
Route::middleware(['auth', 'role:dosen'])->group(function () {
    Route::get('/dashboard/dosen', [DashboardController::class, 'dosend'])->name('dashboard.dosen');

    Route::get('/d11-dashboard', [DashboardController::class, 'dosen']);
    Route::get('/d12-data-mahasiswa', [DashboardController::class, 'showDataMahasiswa'])->name('dashboard.showDataMahasiswa');
    Route::delete('/mahasiswa/{id}', [DashboardController::class, 'destroyMahasiswa'])->name('mahasiswa.destroy');
    // Route::put('/mahasiswa/update-password/{id}', [DashboardController::class, 'updatePassword'])->name('mahasiswa.updatePassword');
    Route::put('/mahasiswa/{id}/update-data', [DashboardController::class, 'updateData'])->name('mahasiswa.updateData');
    Route::get('mahasiswa/{id}/detail-topik', [DashboardController::class, 'detailTopik'])->name('mahasiswa.detailTopik');



    Route::get('/d13-data-nilai', function () {return view('d13-data-nilai');});
    Route::get('/d13-data-nilai', [DashboardController::class, 'showDataNilai'])->name('dashboard.showDataNilai');
    // Route::get('/nilai/{id}/detail', [DashboardController::class, 'detailNilai'])->name('dashboard.detailNilai');
    Route::get('/nilai/{user_id}/detail', [DashboardController::class, 'detailNilai'])->name('dashboard.detailNilai');
    Route::get('/export-nilai-pdf', [DashboardController::class, 'exportNilaiPDF'])->name('nilai.exportPdf');
    Route::get('/export-csv', [DashboardController::class, 'exportNilaiCSV'])->name('nilai.exportCsv');
    // Route::get('/export-nilai-excel', [DashboardController::class, 'exportNilaiExcel'])->name('nilai.exportExcel');
    Route::get('/d14-data-statistik', function () {return view('d14-data-statistik');});
    Route::get('/d15-pengaturan', function () {return view('d15-pengaturan');});
    Route::post('/atur-kkm', [DashboardController::class, 'aturKKM'])->name('dosen.aturKKM')->middleware(['auth', 'role:dosen']);

    Route::get('/bantuanD', function () {return view('bantuanD');});
});




// HANYA BISA DIAKSES MAHASISWA
Route::middleware(['auth', 'role:mahasiswa'])->group(function () {
    Route::get('/dashboard/mahasiswa', [DashboardController::class, 'mahasiswa'])->name('dashboard.mahasiswa');

    Route::post('/simpan-nilai-kuis', [ResultController::class, 'simpanNilai'])->name('kuis.simpan');
    Route::post('/mahasiswa/progress', [ProgressController::class, 'simpan'])->name('progress.simpan');

    Route::get('/bantuanM', function () {return view('bantuanM');});
});




// ROLE DOSEN DAN MAHASISWA BISA AKSES
Route::middleware(['auth', 'role:mahasiswa,dosen'])->group(function () {
    Route::get('/progress/percentage', [ProgressController::class, 'getProgressPercentage'])->name('progress.percentage');
    Route::post('/progress/cek', [ProgressController::class, 'cek'])->name('progress.cek');
    
    Route::get('/b15-pkuis', function () {return view('b15-pkuis');});
    Route::get('/b210-pkuis', function () {return view('b210-pkuis');});
    Route::get('/b32-pkuis', function () {return view('b32-pkuis');});
    Route::get('/b44-pkuis', function () {return view('b44-pkuis');});
    Route::get('/b52-pkuis', function () {return view('b52-pkuis');});
    Route::get('/b61-peval', function () {return view('b61-peval');});

    Route::get('/b16-kuis', function () {
        $user = Auth::user();
        $kkm = \App\Models\Kkm::where('dosen_id', $user->dosen_id)->value('kkm') ?? 70;

        $result = \App\Models\Result::where('user_id', $user->id)->first();
        $nilai = $result?->kuis_1;

        if ($nilai !== null && $nilai >= $kkm) {
            return redirect('/b17-hkuis'); 
        }

        return view('b16-kuis');
    });

    Route::get('/b211-kuis', function () {
        $user = Auth::user();
        $kkm = \App\Models\Kkm::where('dosen_id', $user->dosen_id)->value('kkm') ?? 70;

        $result = \App\Models\Result::where('user_id', $user->id)->first();
        $nilai = $result?->kuis_2;

        if ($nilai !== null && $nilai >= $kkm) {
            return redirect('/b212-hkuis'); 
        }

        return view('b211-kuis');
    });

    Route::get('/b33-kuis', function () {
    $user = Auth::user();
    $kkm = \App\Models\Kkm::where('dosen_id', $user->dosen_id)->value('kkm') ?? 70;

    $result = \App\Models\Result::where('user_id', $user->id)->first();
    $nilai = $result?->kuis_3;

    if ($nilai !== null && $nilai >= $kkm) {
        return redirect('/b34-hkuis');
    }

    return view('b33-kuis');
});

Route::get('/b45-kuis', function () {
    $user = Auth::user();
    $kkm = \App\Models\Kkm::where('dosen_id', $user->dosen_id)->value('kkm') ?? 70;

    $result = Result::where('user_id', $user->id)->first();
    $nilai = $result?->kuis_4;

    if ($nilai !== null && $nilai >= $kkm) {
        return redirect('/b46-hkuis'); 
    }

    return view('b45-kuis');
});

Route::get('/b53-kuis', function () {
    $user = Auth::user();
    $kkm = \App\Models\Kkm::where('dosen_id', $user->dosen_id)->value('kkm') ?? 70;

    $result = Result::where('user_id', $user->id)->first();
    $nilai = $result?->kuis_5;

    if ($nilai !== null && $nilai >= $kkm) {
        return redirect('/b54-hkuis'); 
    }

    return view('b53-kuis');
});

Route::get('/b62-eval', function () {
    $user = Auth::user();
    $kkm = \App\Models\Kkm::where('dosen_id', $user->dosen_id)->value('kkm') ?? 70;

    $result = Result::where('user_id', $user->id)->first();
    $nilai = $result?->evaluasi;

    if ($nilai !== null && $nilai >= $kkm) {
        return redirect('/b63-heval'); 
    }

    return view('b62-eval');
});

    Route::get('/b17-hkuis', [ResultController::class, 'hasilKuis1'])->middleware('auth');
    Route::get('/b212-hkuis', [ResultController::class, 'hasilKuis2'])->middleware('auth');
    Route::get('/b34-hkuis', [ResultController::class, 'hasilKuis3'])->middleware('auth');
    Route::get('/b46-hkuis', [ResultController::class, 'hasilKuis4'])->middleware('auth');
    Route::get('/b54-hkuis', [ResultController::class, 'hasilKuis5'])->middleware('auth');
    Route::get('/b63-heval', [ResultController::class, 'hasilEvaluasi'])->middleware('auth');

});







    // ROUTE UNTUK SEMUA
    Route::get('/', function () {return view('landingPage');});

    Route::get('/register', [RegisterController::class, 'show'])->name('register.show');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

    Route::get('/login', [LoginController::class, 'show'])->name('login');
    Route::post('/login', [LoginController::class, 'auth'])->name('login.auth');

    Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout');

    Route::get('/editor', [EditorController::class, 'index'])->name('editor');
    Route::post('/run', [EditorController::class, 'run'])->name('editor.run');
    Route::get('/editor-wasm', function () {return view('editor-wasm');});



    Route::get('/b00-peta', function () {return view('b00-peta');});
    Route::get('/b11-object', function () {return view('b11-object');});
    Route::get('/b12-terminologi', function () {return view('b12-terminologi');});
    Route::get('/b13-membuatobject', function () {return view('b13-membuatobject');});
    Route::get('/b14-mengaksesp&m', function () {return view('b14-mengaksesp&m');});  
    
    Route::get('/b21-mendeklarasikanm', function () {return view('b21-mendeklarasikanm');});
    Route::get('/b22-mendeklarasikanp', function () {return view('b22-mendeklarasikanp');});
    Route::get('/b23-mendeklarasikanc', function () {return view('b23-mendeklarasikanc');});
    Route::get('/b24-inheritance', function () {return view('b24-inheritance');});
    Route::get('/b25-interface', function () {return view('b25-interface');});
    Route::get('/b26-traits', function () {return view('b26-traits');});
    Route::get('/b27-abstractm', function () {return view('b27-abstractm');});
    Route::get('/b28-constructors', function () {return view('b28-constructors');});
    Route::get('/b29-destructor', function () {return view('b29-destructor');});
    
    Route::get('/b31-konsepd', function () {return view('b31-konsepd');});

    Route::get('/b41-memeriksac', function () {return view('b41-memeriksac');});
    Route::get('/b42-memeriksao', function () {return view('b42-memeriksao');});
    Route::get('/b43-contohpi', function () {return view('b43-contohpi');});

    Route::get('/b51-konsepd', function () {return view('b51-konsepd');});

    Route::get('/bantuanG', function () {return view('bantuanG');});

    Route::get('/ayo-pahami-besar', function () {return view('latihan.ayo-pahami-besar');})->name('ayoPahami.besar');
    Route::get('/ayo-pahami-besar2', function () {return view('latihan.ayo-pahami-besar2');})->name('ayoPahami.besar2');
    Route::get('/ayo-pahami-besar3', function () {return view('latihan.ayo-pahami-besar3');})->name('ayoPahami.besar3');
    Route::get('/ayo-pahami-besar4', function () {return view('latihan.ayo-pahami-besar4');})->name('ayoPahami.besar4');
    Route::get('/ayo-pahami-besar5', function () {return view('latihan.ayo-pahami-besar5');})->name('ayoPahami.besar5');
    Route::get('/ayo-pahami-besar6', function () {return view('latihan.ayo-pahami-besar6');})->name('ayoPahami.besar6');
    Route::get('/ayo-pahami-besar7', function () {return view('latihan.ayo-pahami-besar7');})->name('ayoPahami.besar7');
    Route::get('/ayo-pahami-besar8', function () {return view('latihan.ayo-pahami-besar8');})->name('ayoPahami.besar8');
    Route::get('/ayo-pahami-besar9', function () {return view('latihan.ayo-pahami-besar9');})->name('ayoPahami.besar9');
    Route::get('/ayo-pahami-besar10', function () {return view('latihan.ayo-pahami-besar10');})->name('ayoPahami.besar10');
    Route::get('/ayo-pahami-besar11', function () {return view('latihan.ayo-pahami-besar11');})->name('ayoPahami.besar11');
    Route::get('/ayo-pahami-besar12', function () {return view('latihan.ayo-pahami-besar12');})->name('ayoPahami.besar12');
    Route::get('/ayo-pahami-besar13', function () {return view('latihan.ayo-pahami-besar13');})->name('ayoPahami.besar13');
    Route::get('/ayo-pahami-besar14', function () {return view('latihan.ayo-pahami-besar14');})->name('ayoPahami.besar14');
    Route::get('/ayo-pahami-besar15', function () {return view('latihan.ayo-pahami-besar15');})->name('ayoPahami.besar15');
    Route::get('/ayo-pahami-besar16', function () {return view('latihan.ayo-pahami-besar16');})->name('ayoPahami.besar16');
    Route::get('/ayo-pahami-besar17', function () {return view('latihan.ayo-pahami-besar17');})->name('ayoPahami.besar17');
    Route::get('/ayo-pahami-besar18', function () {return view('latihan.ayo-pahami-besar18');})->name('ayoPahami.besar18');
    Route::get('/ayo-pahami-besar19', function () {return view('latihan.ayo-pahami-besar19');})->name('ayoPahami.besar19');
    Route::get('/ayo-pahami-besar20', function () {return view('latihan.ayo-pahami-besar20');})->name('ayoPahami.besar20');
    Route::get('/ayo-pahami-besar21', function () {return view('latihan.ayo-pahami-besar21');})->name('ayoPahami.besar21');
    Route::get('/ayo-pahami-besar22', function () {return view('latihan.ayo-pahami-besar22');})->name('ayoPahami.besar22');
    Route::get('/ayo-pahami-besar23', function () {return view('latihan.ayo-pahami-besar23');})->name('ayoPahami.besar23');
    Route::get('/ayo-pahami-besar24', function () {return view('latihan.ayo-pahami-besar24');})->name('ayoPahami.besar24');
    Route::get('/ayo-pahami-besar25', function () {return view('latihan.ayo-pahami-besar25');})->name('ayoPahami.besar25');
    Route::get('/ayo-pahami-besar26', function () {return view('latihan.ayo-pahami-besar26');})->name('ayoPahami.besar26');
    Route::get('/ayo-pahami-besar27', function () {return view('latihan.ayo-pahami-besar27');})->name('ayoPahami.besar27');
    Route::get('/ayo-pahami-besar28', function () {return view('latihan.ayo-pahami-besar28');})->name('ayoPahami.besar28');
    Route::get('/ayo-pahami-besar29', function () {return view('latihan.ayo-pahami-besar29');})->name('ayoPahami.besar29');
    Route::get('/ayo-pahami-besar30', function () {return view('latihan.ayo-pahami-besar30');})->name('ayoPahami.besar30');
    Route::get('/ayo-pahami-besar31', function () {return view('latihan.ayo-pahami-besar31');})->name('ayoPahami.besar31');
    Route::get('/ayo-pahami-besar32', function () {return view('latihan.ayo-pahami-besar32');})->name('ayoPahami.besar32');
    Route::get('/ayo-pahami-besar33', function () {return view('latihan.ayo-pahami-besar33');})->name('ayoPahami.besar33');
    Route::get('/ayo-pahami-besar34', function () {return view('latihan.ayo-pahami-besar34');})->name('ayoPahami.besar34');
    Route::get('/ayo-pahami-besar35', function () {return view('latihan.ayo-pahami-besar35');})->name('ayoPahami.besar35');
    Route::get('/ayo-pahami-besar36', function () {return view('latihan.ayo-pahami-besar36');})->name('ayoPahami.besar36');
    Route::get('/ayo-pahami-besar37', function () {return view('latihan.ayo-pahami-besar37');})->name('ayoPahami.besar37');
    Route::get('/ayo-pahami-besar38', function () {return view('latihan.ayo-pahami-besar38');})->name('ayoPahami.besar38');
    Route::get('/ayo-pahami-besar39', function () {return view('latihan.ayo-pahami-besar39');})->name('ayoPahami.besar39');
    Route::get('/ayo-pahami-besar40', function () {return view('latihan.ayo-pahami-besar40');})->name('ayoPahami.besar40');
    Route::get('/ayo-pahami-besar41', function () {return view('latihan.ayo-pahami-besar41');})->name('ayoPahami.besar41');
    Route::get('/ayo-pahami-besar42', function () {return view('latihan.ayo-pahami-besar42');})->name('ayoPahami.besar42');
    Route::get('/ayo-pahami-besar43', function () {return view('latihan.ayo-pahami-besar43');})->name('ayoPahami.besar43');
    Route::get('/ayo-pahami-besar44', function () {return view('latihan.ayo-pahami-besar44');})->name('ayoPahami.besar44');
    Route::get('/ayo-pahami-besar45', function () {return view('latihan.ayo-pahami-besar45');})->name('ayoPahami.besar45');
    Route::get('/ayo-pahami-besar46', function () {return view('latihan.ayo-pahami-besar46');})->name('ayoPahami.besar46');
    Route::get('/ayo-pahami-besar47', function () {return view('latihan.ayo-pahami-besar47');})->name('ayoPahami.besar47');
    Route::get('/ayo-pahami-besar48', function () {return view('latihan.ayo-pahami-besar48');})->name('ayoPahami.besar48');
    Route::get('/ayo-pahami-besar49', function () {return view('latihan.ayo-pahami-besar49');})->name('ayoPahami.besar49');
    
    Route::fallback(function () {
        return redirect('/')->with('error', 'Halaman tidak ditemukan.');
    });