<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Http\RedirectResponse;

class RegisterController extends Controller
{
    public function show()
    {
        return view('register');
    }

    public function store(Request $request): RedirectResponse
{
    $validated = $request->validate([
        'namaInput'     => 'required|string|max:255',
        'emailInput'    => 'required|email|unique:users,email',
        'passwordInput' => 'required|min:8|confirmed',
        'role'          => 'required|in:dosen,mahasiswa',
        'nimInput'      => 'required_if:role,mahasiswa|nullable|numeric',
        'token'         => 'required_if:role,mahasiswa|nullable|string',
    ]);

    // Jika role dosen, buat token
    if ($validated['role'] === 'dosen') {
        $user = User::create([
            'name'     => $validated['namaInput'],
            'email'    => $validated['emailInput'],
            'password' => bcrypt($validated['passwordInput']),
            'role'     => 'dosen',
            'token'    => Str::upper(Str::random(6)),
        ]);
    }

    // Jika role mahasiswa, cari dosen berdasarkan token
    if ($validated['role'] === 'mahasiswa') {
        $dosen = User::where('role', 'dosen')->where('token', $validated['token'])->first();

        if (!$dosen) {
    return back()->withErrors(['token' => 'Token tidak valid atau tidak ditemukan.'])->withInput();
}

        // Cek apakah ada mahasiswa lain di dosen ini dengan NIM yang sama
        $existingNim = User::where('role', 'mahasiswa')
            ->where('dosen_id', $dosen->id)
            ->where('nim', $validated['nimInput'])
            ->first();

if ($existingNim) {
    return back()->withErrors(['nimInput' => 'NIM ini sudah terdaftar di kelas ini.'])->withInput();
}


       

$user = User::create([
    'name'     => $validated['namaInput'],
    'email'    => $validated['emailInput'],
    'password' => bcrypt($validated['passwordInput']),
    'role'     => 'mahasiswa',
    'nim'      => $validated['nimInput'],
    'dosen_id' => $dosen->id
]);

    }

    return redirect()->route('login')->with('success', 'Registrasi berhasil!');
}

}
