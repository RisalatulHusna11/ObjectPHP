<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Result;
use Illuminate\Support\Facades\Auth;

class ResultController extends Controller
{
    public function simpanNilai(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'kuis_ke' => 'required', // bisa integer 1–5 atau 'evaluasi'
            'skor' => 'required|numeric|min:0|max:100',
        ]);

        $kkm = $user->dosen->kkm ?? 70;
        $kuisKe = $request->kuis_ke;

        // Menentukan nama kolom
        if ($kuisKe === 'evaluasi') {
            $kolom = 'evaluasi';
            $jawabanKey = 'kuis_6';
        } elseif (in_array((int)$kuisKe, [1, 2, 3, 4, 5])) {
            $kolom = 'kuis_' . $kuisKe;
        } else {
            return response()->json(['status' => 'invalid_column'], 400);
        }

        $result = Result::firstOrNew(['user_id' => $user->id]);

        // Cegah update jika sudah memenuhi KKM
        if (!is_null($result->$kolom) && $result->$kolom >= $kkm) {
            return response()->json(['status' => 'kkm_met']);
        }

        // Simpan nilai & data user
        $result->nama = $user->name;
        $result->email = $user->email;
        $result->$kolom = $request->skor;

        // Hitung rata-rata dari semua nilai kuis dan evaluasi
        $fields = ['kuis_1', 'kuis_2', 'kuis_3', 'kuis_4', 'kuis_5', 'evaluasi'];
        $nilaiTotal = 0;
        $jumlah = 0;

        foreach ($fields as $f) {
            if (!is_null($result->$f)) {
                $nilaiTotal += $result->$f;
                $jumlah++;
            }
        }

        $result->rata_rata = $jumlah > 0 ? round($nilaiTotal / $jumlah, 2) : null;
        
        if ($request->has('jawaban_json')) {
            $jawabanBaru = $request->input('jawaban_json');
            $jsonLama = json_decode($result->jawaban_json, true) ?? [];
            $jsonLama[$kolom] = $jawabanBaru;
            if ($kolom === 'evaluasi' && isset($jawabanBaru['evaluasi'])) {
                $jsonLama[$kolom] = $jawabanBaru['evaluasi'];
            }

            $result->jawaban_json = json_encode($jsonLama);
        }
        
        $result->save();

        return response()->json(['status' => 'ok']);
    }

    
    public function hasilKuis1()
    {
        $userId = auth()->id();
        $result = Result::where('user_id', $userId)->first();
        $kkm = auth()->user()->dosen->kkm ?? 70;

        return view('b17-hkuis', compact('result', 'kkm'));
    }

    public function hasilKuis2()
    {
        $userId = auth()->id();
        $result = \App\Models\Result::where('user_id', $userId)->first();
        $kkm = auth()->user()->dosen->kkm ?? 70;

        return view('b212-hkuis', compact('result', 'kkm'));
    }

    public function hasilKuis3()
    {
        $userId = auth()->id();
        $result = \App\Models\Result::where('user_id', $userId)->first();
        $kkm = auth()->user()->dosen->kkm ?? 70;

        return view('b34-hkuis', compact('result', 'kkm'));
    }

    public function hasilKuis4()
    {
        $userId = auth()->id();
        $result = \App\Models\Result::where('user_id', $userId)->first();
        $kkm = auth()->user()->dosen->kkm ?? 70;

        return view('b46-hkuis', compact('result', 'kkm'));
    }

    public function hasilKuis5()
    {
        $userId = auth()->id();
        $result = \App\Models\Result::where('user_id', $userId)->first();
        $kkm = auth()->user()->dosen->kkm ?? 70;

        return view('b54-hkuis', compact('result', 'kkm'));
    }

    public function hasilEvaluasi()
    {
        $userId = auth()->id();
        $result = \App\Models\Result::where('user_id', $userId)->first();
        $kkm = auth()->user()->dosen->kkm ?? 70;

        return view('b63-heval', compact('result', 'kkm'));
    }





}
