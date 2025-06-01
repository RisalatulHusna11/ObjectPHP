<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgressMahasiswa extends Model
{
    protected $table = 'progress_mahasiswa';

    protected $fillable = [
        'user_id',
        'halaman',
        'selesai'
    ];
}
