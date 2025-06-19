<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>i-ObjectPHP</title>

  <link rel="icon" type="image/png" href="{{ asset('images/logo3.png') }}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500;700&display=swap" rel="stylesheet">

  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: 'Quicksand', sans-serif;
      background: linear-gradient(to right, #fdfcff, #f3ebff);
      padding: 2rem;
      color: #333;
    }

    .ayo-pahami-wrapper {
      max-width: 1400px;
      margin: auto;
      padding: 2rem;
      border-radius: 16px;
      background: #fff;
      box-shadow: 0 12px 24px rgba(111, 66, 193, 0.15);
      animation: fadeIn 0.6s ease-in-out;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .quiz-header {
      text-align: center;
      margin-bottom: 2rem;
    }

    .quiz-header h1 {
      font-size: 2rem;
      color: #6f42c1;
    }

    .quiz-header p {
      font-size: 1rem;
      color: #555;
    }

    .ayo-pahami-grid {
      display: flex;
      flex-direction: column;
      gap: 2rem;
    }

    @media (min-width: 768px) {
      .ayo-pahami-grid {
        flex-direction: row;
      }
    }

    .kode-diketik, .editor-embed {
      flex: 1;
    }

    .kode-instruksi {
      background: #f5f3ff;
      border: 2px dashed #c9a9ff;
      padding: 1rem;
      border-radius: 12px;
      font-family: 'Courier New', monospace;
      font-size: 0.95rem;
      line-height: 1.5;
      user-select: none;
      transition: background 0.3s;
    }

    .kode-instruksi:hover {
      background: #ede5ff;
    }

    .kode-instruksi pre {
      margin: 0;
      white-space: pre-wrap;
      word-break: break-word;
    }

    iframe {
      width: 100%;
      height: 540px;
      border-radius: 12px;
      border: 2px solid #e0c7ff;
    }

    .text-center {
      text-align: center;
    }

    .btn-secondary {
      margin-top: 2rem;
      padding: 10px 20px;
      background: #6f42c1;
      color: #fff;
      text-decoration: none;
      border-radius: 8px;
      font-weight: bold;
      transition: background 0.3s ease;
      display: inline-block;
    }

    .btn-secondary:hover {
      background: #5b33a1;
    }

    .penjelasan
     {
  background: #fef6ff;
  border-left: 6px solid #d96ae2;
  padding: 1.2rem 1.5rem;
  margin-top: 2rem;
  border-radius: 10px;
  font-size: 1.05rem;
  line-height: 1.75;
  color: #333;
  position: relative;
  box-shadow: 0 3px 8px rgba(216, 106, 226, 0.08);
}

.penjelasan
 code {
  font-family: 'Courier New', monospace;
  color:rgb(204, 60, 132);
  /* font-weight: bold; */
  background: none;
  padding: 0;
}


  </style>
</head>
<body>

  <div class="ayo-pahami-wrapper">
  <div class="quiz-header">
    <h1>AYO PAHAMI!</h1><br>
    <p><strong>Petunjuk:</strong></p>
    <ol style="text-align: left; max-width: 800px; margin: 1rem auto; color: #555; font-size: 1rem; line-height: 1.6;">
        <li>Perhatikan kode program PHP yang ditampilkan di kotak sebelah kiri.</li>
        <li>Ketik ulang seluruh baris kode tersebut ke dalam editor di sebelah kanan.</li>
        <li>Pastikan setiap baris dan struktur penulisan sesuai dengan contoh (termasuk titik koma, kurung, dll).</li>
        <li>Tekan tombol <code>RUN</code> di dalam editor untuk menjalankan program.</li>
        <li>Perhatikan hasil keluaran di bawah editor. Apa yang ditampilkan?</li>
    </ol>
  </div>

  <div class="ayo-pahami-grid">
    <div class="kode-diketik">
      @yield('kode')
    </div>

  <div class="text-center">
    <a href="{{ url()->previous() }}" class="btn-secondary">⬅ Kembali ke Halaman Sebelumnya</a>
  </div>
</div>


</body>
</html>
