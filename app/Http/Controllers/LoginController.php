<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class LoginController extends Controller
{
    public function show()
    {
        return view('login');
    }

    public function auth(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $remember = $request->has('checkRemember'); // ✅ support "ingat saya"

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            $user = Auth::user();

            // ✅ redirect dan flash sukses sesuai role
            if ($user->role === 'dosen') {
                return redirect()->route('dashboard.dosen')->with('success', 'Login berhasil!');
            } elseif ($user->role === 'mahasiswa') {
                return redirect()->route('dashboard.mahasiswa')->with('success', 'Login berhasil!');
            } else {
                return redirect('/')->with('success', 'Login berhasil!');
            }
        }

        // ❌ login gagal
        return back()->with('error', 'Email atau password salah!')->withInput();
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Anda telah logout.');
    }
}
