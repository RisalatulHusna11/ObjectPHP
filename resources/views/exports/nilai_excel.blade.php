<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #e0d4f7;
        }
    </style>
</head>
<body>
    <h2 style="text-align:center">Laporan Nilai Mahasiswa</h2>

    <p><strong>Nama Dosen:</strong> {{ $dosen->name }}</p>
    <p><strong>Email Dosen:</strong> {{ $dosen->email }}</p>
    <p><strong>Token Kelas:</strong> {{ $dosen->token }}</p>
    <p><strong>Tanggal Cetak:</strong> {{ date('d-m-Y H:i') }}</p>

    <br>

    <table>
        <thead>
            <tr>
                <th>No</th>
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
            @foreach ($nilai as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
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
