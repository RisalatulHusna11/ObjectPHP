@extends('layout.mainMateriA')

@section('kode')
<div class="kode-instruksi" oncopy="return false" oncut="return false" oncontextmenu="return false">
<pre><code>&lt;?php
class RekeningBank {
    public $saldo = 0;

    public function setor($jumlah) {
        $this->saldo += $jumlah;
        $this->catatTransaksi();
    }

    protected function tarik($jumlah) {
        if ($jumlah <= $this->saldo) {
            $this->saldo -= $jumlah;
            $this->catatTransaksi();
        } else {
            echo "Saldo tidak cukup!";
        }
    }

    private function catatTransaksi() {
        echo "Transaksi berhasil. Saldo saat ini: {$this->saldo}\n";
    }
}

$rekening = new RekeningBank();
$rekening->setor(1000);
// $rekening->tarik(500); // Tidak dapat dipanggil karena bersifat protected
// $rekening->catatTransaksi(); // Tidak dapat dipanggil karena bersifat private</code></pre>
      </div>
    </div> 

    <div class="editor-embed">
      <iframe src="{{ route('editor') }}" width="100%" height="520" frameborder="0" style="border-radius: 12px; overflow: hidden;"></iframe>
    </div>
  </div> 

  <br>

    <ul class="penjelasan"> Pada contoh di atas:
      <li><strong><code>setor()</code> bersifat public</strong> sehingga dapat diakses di luar class.</li>
      <li><strong><code>tarik()</code> bersifat protected</strong> hanya bisa dipanggil dari dalam class atau subclass.</li>
      <li><strong><code>catatTransaksi()</code> bersifat private</strong> sehingga hanya bisa dipanggil di dalam class RekeningBank.</li>
    </ul>
@endsection

