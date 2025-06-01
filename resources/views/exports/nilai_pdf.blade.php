<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Laporan Nilai Mahasiswa</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        h2 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #444; padding: 6px; text-align: left; }
        th { background: #f0e8ff; }
    </style>
</head>
<body>
    <h2>Laporan Nilai Mahasiswa</h2>
    <p><strong>Nama Dosen:</strong> {{ $dosen->name }}</p>
    <p><strong>Email Dosen:</strong> {{ $dosen->email }}</p>
    <p><strong>Token Kelas:</strong> {{ $dosen->token }}</p>

    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Kuis 1</th>
                <th>Kuis 2</th>
                <th>Kuis 3</th>
                <th>Kuis 4</th>
                <th>Kuis 5</th>
                <th>Evaluasi</th>
                <th>Rata-rata</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($nilai as $item)
                <tr>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->kuis_1 ?? '-' }}</td>
                    <td>{{ $item->kuis_2 ?? '-' }}</td>
                    <td>{{ $item->kuis_3 ?? '-' }}</td>
                    <td>{{ $item->kuis_4 ?? '-' }}</td>
                    <td>{{ $item->kuis_5 ?? '-' }}</td>
                    <td>{{ $item->evaluasi ?? '-' }}</td>
                    <td>{{ number_format($item->rata_rata, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
