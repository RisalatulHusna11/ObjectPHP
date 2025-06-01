<?php

namespace App\Exports;

use App\Models\Result;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView; 
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel; 

class NilaiExport implements FromView
{
    public function view(): View
    {
        $dosen = Auth::user();

        $nilai = Result::whereIn('user_id', function ($query) use ($dosen) {
            $query->select('id')
                  ->from('users')
                  ->where('dosen_id', $dosen->id);
        })->get();

        return view('exports.nilai_excel', [
            'nilai' => $nilai,
            'dosen' => $dosen
        ]);
    }
}
