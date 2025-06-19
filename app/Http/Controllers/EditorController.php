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

        // 1. Filter fungsi berbahaya
        $bahaya = [
            'exec', 'system', 'passthru', 'shell_exec', 'proc_open', 'popen',
            'fopen', 'fwrite', 'fread', 'file_get_contents', 'file_put_contents',
            'unlink', 'rmdir', 'copy', 'rename', 'move_uploaded_file',
            'scandir', 'parse_ini_file', 'highlight_file', 'ini_get_all',
            'pcntl_', 'posix_', 'apache_', 'dl', 'chroot', 'putenv', 'getenv',
            '`', 'eval', 'base64_decode', 'include', 'require'
        ];

        foreach ($bahaya as $kata) {
            if (stripos($code, $kata) !== false) {
                return response()->json(['output' => "⚠️ Fungsi '$kata' diblokir demi keamanan."]);
            }
        }

        // 2. Batasi panjang kode
        if (strlen($code) > 3000) {
            return response()->json(['output' => '⚠️ Kode terlalu panjang. Maksimal 3000 karakter.']);
        }

        // 3. Simpan ke file temporer
        $filename = storage_path('app/temp_code_' . uniqid() . '.php');
        file_put_contents($filename, "<?php\n" . $code);

        // 4. Eksekusi aman
        try {
            $command = "timeout 3 php " . escapeshellarg($filename) . " 2>&1";
            $output = shell_exec($command);
            unlink($filename);
        } catch (\Throwable $e) {
            $output = 'Terjadi kesalahan saat eksekusi.';
        }

        return response()->json(['output' => $output]);
    }
}
