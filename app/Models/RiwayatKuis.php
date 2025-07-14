<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatKuis extends Model
{
    use HasFactory;

    protected $table = 'riwayat_kuis';

    protected $fillable = [
        'user_id',
        'tipe_kuis',
        'benar',
        'salah',
        'nilai',
        'status',
        'jawaban',
        'waktu_selesai',
    ];

    protected $casts = [
        'jawaban' => 'array',
        'waktu_selesai' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

