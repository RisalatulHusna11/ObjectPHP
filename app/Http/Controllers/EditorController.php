<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditorController extends Controller
{
    public function index()
    {
        return view('editor');
    }

    public function run(Request $request)
{
    $code = $request->input('code');

    // Cek fungsi berbahaya
    if (preg_match('/\b(exec|system|passthru|shell_exec|proc_open|popen)\b/i', $code)) {
        return response()->json(['output' => 'Fungsi ini tidak diizinkan demi keamanan.']);
    }

    $filename = storage_path('app/temp_code_' . time() . '.php');
    file_put_contents($filename, $code);

    try {
        $command = "php " . escapeshellarg($filename);
        $output = shell_exec($command . " 2>&1");
        unlink($filename);
    } catch (\Exception $e) {
        $output = 'Terjadi kesalahan saat eksekusi.';
    }

    return response()->json(['output' => $output]);
}
}
